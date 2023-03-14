<?php

namespace App\Http\Controllers;

use App\Models\Lir;
use App\Models\Ir;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tes()
    {
        //
        return view('lir.tes');
    }

    public function tes2()
    {
        //
        return view('lir.tes2');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$lirs = Lir::all();
        $irs = Ir::all();

        //$lirs = Lir::where('userid', '=', auth()->user()->id)->get();
        $lirs = Lir::with('Ir')->where('userid', '=', auth()->user()->id)->get();
        /* $lirs->Ir->irnm; // get ir name from table Irs
           https://stackoverflow.com/questions/70664422/laravel-getting-value-from-another-table-using-eloquent
        */

        return view('lir.index', [
            'lirs' => $lirs, 'irs' => $irs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'tglir' => 'required|unique:lirs',
        $request->validate([
            'tglir' => [
                Rule::unique('lirs')
                  ->where('tglir', $request->input('tglir'))
                  ->where('ir', $request->input('ir'))
            ],
            'ir' => 'required',
            'wktir1' => 'required',
            'wktir2' => 'required',
            'gembala' => 'required',
            'npria' => 'required',
            'nwanita' => 'required',
            'nhadir' => 'required',
            'wl' => 'required',
            'wl_dtg' => 'required',
            'singer1' => 'required',
            'singer1_dtg' => 'required',
            'pembicara' => 'required',
            'wktbicara1' => 'required',
            'wktbicara2' => 'required',
            'pemusik1' => 'required',
            'pemusik1_dtg' => 'required',
            'pemusik2' => 'required',
            'pemusik2_dtg' => 'required',
            'pemusik3' => 'required',
            'pemusik3_dtg' => 'required',
            'media1' => 'required',
            'media1_dtg' => 'required',
            'soundman1' => 'required',
            'soundman1_dtg' => 'required',
            'ket' => 'required'
        ]);

        $data = $request->only([
            'userid',
            'tglir', 'wktir1', 'wktir2', 'ir', 'gembala',
            'npria', 'nwanita', 'nhadir', 'jbpria', 'jbwanita', 'jbhadir', 'lbpria', 'lbwanita', 'lbhadir',
            'wl', 'wl_dtg', 'singer1', 'singer1_dtg', 'singer2', 'singer2_dtg', 'pembicara', 'wktbicara1', 'wktbicara2',
            'pemusik1', 'pemusik2', 'pemusik3', 'pemusik4', 'pemusik5', 'pemusik6',
            'pemusik1_dtg', 'pemusik2_dtg', 'pemusik3_dtg', 'pemusik4_dtg', 'pemusik5_dtg', 'pemusik6_dtg',
            'penari1', 'penari2', 'penari3', 'penari4',
            'penari1_dtg', 'penari2_dtg', 'penari3_dtg', 'penari4_dtg',
            'media1', 'media2', 'media3', 'media4', 'media5', 'media6',
            'media1_dtg', 'media2_dtg', 'media3_dtg', 'media4_dtg', 'media5_dtg', 'media6_dtg',
            'lighting1', 'lighting1_dtg', 'lighting2', 'lighting2_dtg',
            'soundman1', 'soundman2', 'soundman3',
            'soundman1_dtg', 'soundman2_dtg', 'soundman3_dtg',
            'qsuara_a', 'qsuara_b', 'qsuara_c', 'qsuara_d', 'qsuara_e',
            'pn01', 'pn02', 'pn03', 'pn04', 'pn05', 'pn06', 'pn07', 'pn08', 'pn09', 'pn10', 'pn11', 'pn12', 'pn13',
            'pc01', 'pc02', 'pc03', 'pc04', 'pc05', 'pc06', 'pc07', 'pc08', 'pc09', 'pc10', 'pc11', 'pc12', 'pc13',
            'rn01', 'rn02', 'rn03', 'rn04', 'rn05', 'rn06',
            'ket'
        ]);

        $data['userid'] = auth()->user()->id;

        // format seluruh field dgn format datetime atau time only dgn H:i:s spy bs di save ke DB (khsusnya MySQL / MariaDB)
        // $item->date = date('Y-m-d H:i:s', strtotime($request->date));
        $data['tglir'] = date('Y-m-d', strtotime($data['tglir']));
        $data['wktir1'] = date('H:i:s', strtotime($data['wktir1']));
        $data['wktir2'] = date('H:i:s', strtotime($data['wktir2']));
        $data['wl_dtg'] = date('H:i:s', strtotime($data['wl_dtg']));
        $data['singer1_dtg'] = date('H:i:s', strtotime($data['singer1_dtg']));
        if (isset($data['singer2_dtg']) && !empty($data['singer2_dtg'])) {
            $data['singer2_dtg'] = date('H:i:s', strtotime($data['singer2_dtg']));
        }
        $data['wktbicara1'] = date('H:i:s', strtotime($data['wktbicara1']));
        $data['wktbicara2'] = date('H:i:s', strtotime($data['wktbicara2']));
        $data['pemusik1_dtg'] = date('H:i:s', strtotime($data['pemusik1_dtg']));
        $data['pemusik2_dtg'] = date('H:i:s', strtotime($data['pemusik2_dtg']));
        $data['pemusik3_dtg'] = date('H:i:s', strtotime($data['pemusik3_dtg']));
        if (isset($data['pemusik4_dtg']) && !empty($data['pemusik4_dtg'])) {
            $data['pemusik4_dtg'] = date('H:i:s', strtotime($data['pemusik4_dtg']));
        }
        if (isset($data['pemusik5_dtg']) && !empty($data['pemusik5_dtg'])) {
            $data['pemusik5_dtg'] = date('H:i:s', strtotime($data['pemusik5_dtg']));
        }
        if (isset($data['pemusik6_dtg']) && !empty($data['pemusik6_dtg'])) {
            $data['pemusik6_dtg'] = date('H:i:s', strtotime($data['pemusik6_dtg']));
        }
        $data['penari1_dtg'] = date('H:i:s', strtotime($data['penari1_dtg']));
        $data['penari2_dtg'] = date('H:i:s', strtotime($data['penari2_dtg']));
        $data['media1_dtg'] = date('H:i:s', strtotime($data['media1_dtg']));
        $data['media2_dtg'] = date('H:i:s', strtotime($data['media2_dtg']));
        if (isset($data['media3_dtg']) && !empty($data['media3_dtg'])) {
            $data['media3_dtg'] = date('H:i:s', strtotime($data['media3_dtg']));
        }
        if (isset($data['media4_dtg']) && !empty($data['media4_dtg'])) {
            $data['media4_dtg'] = date('H:i:s', strtotime($data['media4_dtg']));
        }
        if (isset($data['media5_dtg']) && !empty($data['media5_dtg'])) {
            $data['media5_dtg'] = date('H:i:s', strtotime($data['media5_dtg']));
        }
        if (isset($data['media6_dtg']) && !empty($data['media6_dtg'])) {
            $data['media6_dtg'] = date('H:i:s', strtotime($data['media6_dtg']));
        }
        $data['lighting1_dtg'] = date('H:i:s', strtotime($data['lighting1_dtg']));
        if (isset($data['lighting2_dtg']) && !empty($data['lighting2_dtg'])) {
            $data['lighting2_dtg'] = date('H:i:s', strtotime($data['lighting2_dtg']));
        }
        $data['soundman1_dtg'] = date('H:i:s', strtotime($data['soundman1_dtg']));
        $data['soundman2_dtg'] = date('H:i:s', strtotime($data['soundman2_dtg']));
        if (isset($data['soundman3_dtg']) && !empty($data['soundman3_dtg'])) {
            $data['soundman3_dtg'] = date('H:i:s', strtotime($data['soundman3_dtg']));
        }

        //seluruh field numeric yg not null hrs diisi default jk tidak diisi (jd Null)
        $data['jbpria'] = $data['jbpria'] ?? 0;
        $data['jbwanita'] = $data['jbwanita'] ?? 0;
        $data['jbhadir'] = $data['jbhadir'] ?? 0;
        $data['lbpria'] = $data['lbpria'] ?? 0;
        $data['lbwanita'] = $data['lbwanita'] ?? 0;
        $data['lbhadir'] = $data['lbhadir'] ?? 0;

        //get value dari input type="checkbox", jk di centang 1, jk tdk maka 0
        $data['qsuara_a'] = $request->has('qsuara_a');
        $data['qsuara_b'] = $request->has('qsuara_b');
        $data['qsuara_c'] = $request->has('qsuara_c');
        $data['qsuara_d'] = $request->has('qsuara_d');
        $data['qsuara_e'] = $request->has('qsuara_e');

        $lir = Lir::create($data);
        return redirect()->route('lir.index')
            ->with('success_message', 'Berhasil menambah data baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lir  $lir
     * @return \Illuminate\Http\Response
     */
    public function show(Lir $lir)
    {
        //$lir->tglir = date('d-m-Y', strtotime($lir->tglir));

        return view('lir.show', [
            'lir' => $lir
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lir  $lir
     * @return \Illuminate\Http\Response
     */
    public function edit(Lir $lir)
    {
        //$lir->tglir = date('d-m-Y', strtotime($lir->tglir));

        return view('lir.edit', [
            'lir' => $lir
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lir  $lir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lir $lir)
    {
        //
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'password' => 'sometimes|nullable|confirmed'
        // ]);
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // if ($request->password) $user->password = bcrypt($request->password);
        // $user->save();
        // return redirect()->route('users.index')
        //     ->with('success_message', 'Berhasil mengubah user');


        // DB::beginTransaction();
        // try {
        //   $lir->fill($request->all())->save();
        //   DB::commit();
        // } catch (Exception $e) {
        //   DB::rollback();
        //    abort(500);
        // }

        $request->validate([
            'tglir' => [
                Rule::unique('lirs')
                  ->where('tglir', $request->input('tglir'))
                  ->where('ir', $request->input('ir'))
            ],
            'wktir1' => 'required',
            'wktir2' => 'required',
            'gembala' => 'required',
            'npria' => 'required',
            'nwanita' => 'required',
            'nhadir' => 'required',
            'wl' => 'required',
            'wl_dtg' => 'required',
            'singer1' => 'required',
            'singer1_dtg' => 'required',
            'pembicara' => 'required',
            'wktbicara1' => 'required',
            'wktbicara2' => 'required',
            'pemusik1' => 'required',
            'pemusik1_dtg' => 'required',
            'pemusik2' => 'required',
            'pemusik2_dtg' => 'required',
            'pemusik3' => 'required',
            'pemusik3_dtg' => 'required',
            'media1' => 'required',
            'media1_dtg' => 'required',
            'soundman1' => 'required',
            'soundman1_dtg' => 'required',
            'ket' => 'required'
        ]);

        // $lir->npria = $request->npria;
        // $lir->nwanita = $request->nwanita;
        // $lir->nhadir = $request->nhadir;
        // $lir->ket = $request->ket;
        //mapping per column diatas di ganti dgn dibawah ini
        $data = $request->all();

        //get value dari input type="checkbox", jk di centang 1, jk tdk maka 0
        $data['qsuara_a'] = $request->has('qsuara_a');
        $data['qsuara_b'] = $request->has('qsuara_b');
        $data['qsuara_c'] = $request->has('qsuara_c');
        $data['qsuara_d'] = $request->has('qsuara_d');
        $data['qsuara_e'] = $request->has('qsuara_e');

        $lir->fill($data)->save();

        return redirect()->route('lir.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lir  $lir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lir $lir)
    {
        //
        // $user = User::find($id);
        // if ($id == $request->user()->id) return redirect()->route('users.index')
        //     ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($lir) $lir->delete();
        return redirect()->route('lir.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
