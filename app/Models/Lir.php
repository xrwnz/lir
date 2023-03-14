<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lir extends Model
{
    use HasFactory;

    protected $primaryKey = 'lirid';

    public $incrementing = false;

    protected $dates = ['tglir'];

    
    public function Ir()
    {
        return $this->belongsTo(Ir::class, 'ir', 'irpk');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid',
        'tglir', 'wktir1', 'wktir2',
        'ir', 'gembala',
        'npria', 'nwanita', 'nhadir',
        'jbpria', 'jbwanita', 'jbhadir',
        'lbpria', 'lbwanita', 'lbhadir',
        'wl', 'singer1', 'singer2',
        'wl_dtg', 'singer1_dtg', 'singer2_dtg',
        'pembicara', 'wktbicara1', 'wktbicara2',
        'pemusik1', 'pemusik2', 'pemusik3', 'pemusik4', 'pemusik5', 'pemusik6',
        'pemusik1_dtg', 'pemusik2_dtg', 'pemusik3_dtg', 'pemusik4_dtg', 'pemusik5_dtg', 'pemusik6_dtg',
        'penari1', 'penari2', 'penari3', 'penari4',
        'penari1_dtg', 'penari2_dtg', 'penari3_dtg', 'penari4_dtg',
        'media1', 'media2', 'media3', 'media4', 'media5', 'media6',
        'media1_dtg', 'media2_dtg', 'media3_dtg', 'media4_dtg', 'media5_dtg', 'media6_dtg',
        'lighting1', 'lighting2',
        'lighting1_dtg', 'lighting2_dtg',
        'soundman1', 'soundman2', 'soundman3',
        'soundman1_dtg', 'soundman2_dtg', 'soundman3_dtg',
        'qsuara_a', 'qsuara_b', 'qsuara_c', 'qsuara_d', 'qsuara_e',
        'pn01', 'pn02', 'pn03', 'pn04', 'pn05', 'pn06', 'pn07', 'pn08', 'pn09', 'pn10', 'pn11', 'pn12', 'pn13',
        'pc01', 'pc02', 'pc03', 'pc04', 'pc05', 'pc06', 'pc07', 'pc08', 'pc09', 'pc10', 'pc11', 'pc12', 'pc13',
        'rn01', 'rn02', 'rn03', 'rn04', 'rn05', 'rn06',
        'ket',
    ];
}
