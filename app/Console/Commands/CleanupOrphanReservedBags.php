<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Center;
use App\Models\BloodType;
use App\Models\BloodBag;
use App\Models\ReservationRequest;
use App\Models\ReservationBloodBag;
use App\Models\CenterBloodTypeInventory;

class CleanupOrphanReservedBags extends Command
{
    protected $signature = 'blood:cleanup-orphans {centerName} {bloodGroup} {--dry-run}';
    protected $description = 'Libère ou supprime les poches reserved sans réservation active (pending|confirmed) pour un centre et groupe sanguin.';

    public function handle()
    {
        $centerName = $this->argument('centerName');
        $bloodGroup = $this->argument('bloodGroup');
        $dry = $this->option('dry-run');

        $center = Center::where('name',$centerName)->first();
        if(!$center){
            $this->error("Centre introuvable: $centerName");
            return 1;
        }
        $bloodType = BloodType::where('group',$bloodGroup)->first();
        if(!$bloodType){
            $this->error("Groupe sanguin introuvable: $bloodGroup");
            return 1;
        }

        // Toutes les poches reserved pour ce centre/groupe
        $reservedBags = BloodBag::where('center_id',$center->id)
            ->where('blood_type_id',$bloodType->id)
            ->where('status','reserved')
            ->get();

        if($reservedBags->isEmpty()){
            $this->info('Aucune poche reserved.');
            return 0;
        }

        // Déterminer les poches liées à une réservation active
        $activeBagIds = ReservationBloodBag::whereIn('blood_bag_id',$reservedBags->pluck('id'))
            ->whereHas('reservationRequest', function($q){
                $q->whereIn('status',['pending','confirmed']);
            })
            ->pluck('blood_bag_id')
            ->unique();

        $orphans = $reservedBags->whereNotIn('id',$activeBagIds);

        $this->table(['Type','ID','Status'], $reservedBags->map(function($b) use($activeBagIds){
            return [ $activeBagIds->contains($b->id) ? 'ACTIF' : 'ORPHELIN', $b->id, $b->status ];
        })->toArray());

        $this->info("Total reserved: {$reservedBags->count()} | Actifs: {$activeBagIds->count()} | Orphelins: {$orphans->count()}");

        if($orphans->isEmpty()){
            $this->info('Aucune poche orpheline à libérer.');
            return 0;
        }

        if($dry){
            $this->warn('Dry-run activé: aucune modification appliquée.');
            return 0;
        }

        // Libérer les poches orphelines
        BloodBag::whereIn('id',$orphans->pluck('id'))->update(['status'=>'available']);

        // Recalcul inventaire
        $available = BloodBag::where('center_id',$center->id)->where('blood_type_id',$bloodType->id)->where('status','available')->count();
        $reserved = BloodBag::where('center_id',$center->id)->where('blood_type_id',$bloodType->id)->where('status','reserved')->count();
        CenterBloodTypeInventory::updateOrCreate(
            ['center_id'=>$center->id,'blood_type_id'=>$bloodType->id],
            ['available_quantity'=>$available,'reserved_quantity'=>$reserved]
        );

        $this->info('Poches orphelines libérées et inventaire mis à jour.');
        return 0;
    }
}
