<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Data extends Model
{
    use HasFactory;

    // $table->string('bulan');
    //         $table->float('ha_block');
    //         $table->float('ffb_produksi_ton');
    //         $table->float('janjang_panen');
    //         $table->float('brondolan_kg');

    //! saveHelper func saving to database
    public static function saveHelper($dcentroid1, $dcentroid2, $dcentroid3, $mindistance, $clusterall)
    {
        return DB::table('centeroids')->insert([
            'distancecentroid1'        => $dcentroid1,
            'distancecentroid2'        => $dcentroid2,
            'distancecentroid3'        => $dcentroid3,
            'mindistance'        => $mindistance,
            'cluster'        => $clusterall,
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
            ->select(DB::raw("AVG(ha_block) as avgha_block"), DB::raw("AVG(ffb_produksi_ton) as avgproduksi"), DB::raw("AVG(jenjang_panen) as avgjenjangpanen"), DB::raw("AVG(brondolan_kg) as avgbrondolankg"))
            ->get();
    }
}
