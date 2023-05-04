<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Menu\Pendaftaran;

class DataPendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id_data_kegiatan = $this->input('id_data_kegiatan');
        $id_pendaftaran = $this->route('pendaftaran');
    
        // validasi opsi data kegiatan hanya boleh dipilih sekali
        $uniqueDataKegiatan = function ($attribute, $value, $fail) use ($id_data_kegiatan, $id_pendaftaran) {
            $count = Pendaftaran::where('id_data_kegiatan', $id_data_kegiatan)
                ->when($id_pendaftaran, function ($query) use ($id_pendaftaran) {
                    $query->where('id', '!=', $id_pendaftaran);
                })
                ->count();
    
            if ($count > 0) {
                $fail('Data kegiatan yang dipilih sudah terdaftar pada pendaftaran lain.');
            }
        };
    
        return [
            'id_data_user' => 'required|integer',
            'id_data_kegiatan' => ['required', 'integer', $uniqueDataKegiatan],
            'provinsi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
        ];
    }
}
