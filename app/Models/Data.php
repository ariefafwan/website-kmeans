<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Data extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['desa_id', 'clus_hasil_id', 'ph_air', 'ph_tanah', 'suhu', 'sample', 'longitude', 'latitude'];

    //! saveHelper func saving to database
    public static function saveHelper($dcentroid1, $dcentroid2, $dcentroid3, $mindistance, $clusterall)
    {
        return DB::table('centeroids')->insert([
            'distancecentroid1'        => $dcentroid1,
            'distancecentroid2'        => $dcentroid2,
            'distancecentroid3'        => $dcentroid3,
            'mindistance'              => $mindistance,
            'cluster'                  => $clusterall,
        ]);
    }

    //! deleteHelper func to truncate row centroids table
    public static function deleteHelper()
    {
        return DB::select("TRUNCATE Table centeroids");
    }

    //! groupby
    public static function groupClusterHelper()
    {
        return DB::table('centeroids')
            ->select(DB::raw('cluster as cluster'), DB::raw('avg(mindistance) as average'))
            ->groupBy(DB::raw('cluster'))
            ->get();
    }

    public static function groupingSameValueCluster()
    {
        return DB::table('centeroids')
            ->select('cluster', DB::raw('mindistance as "mindistance"'), DB::raw('count(*) as count'))
            ->groupBy('cluster', \DB::raw('mindistance'))
            ->get();
    }
    //! avg all data
    public static function avgDataDisaster()
    {
        return DB::table('datas')
            ->select(DB::raw("AVG(ph_air) as avgph_air"), DB::raw("AVG(suhu) as avgph_tanah"), DB::raw("AVG(ph_tanah) as avgph_tanah"))
            ->get();
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function clus_hasil()
    {
        return $this->belongsTo(ClusHasil::class);
    }

    // public function getFileMarkerAttribute()
    // {
    //     $file = $this->clus_hasil->marker;
    //     return asset('storage/marker/' . $file);
    // }
}
