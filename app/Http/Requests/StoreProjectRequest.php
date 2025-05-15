<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_project' => 'required|string|max:255',
            'tanggal_project' => 'required|date',
            'estimasi_lama' => 'required|integer|min:0',
            'rencana_anggaran_produksi' => 'required|integer|min:0',
            'rencana_anggaran_biaya' => 'required|integer|min:0',

            'partner_id' => 'required|exists:partners,id',

            'jenis_proyek' => 'nullable|array',
            'jenis_proyek.*' => 'exists:project_types,id',

            'status_penajuan_kebutuhan_material' => 'required|in:pending,diterima,ditolak',
            'status_inspeksi_logistik' => 'required|in:pending,diterima,ditolak',
            'status_ajuhan_upahan' => 'required|in:pending,diterima,ditolak',

            'status_project' => 'required|in:pending,aktif,selesaibatal',

            'status_milestone_20' => 'required|in:pending,hutang,piutang,lunas',
            'status_milestone_50' => 'required|in:pending,hutang,piutang,lunas',
            'status_milestone_80' => 'required|in:pending,hutang,piutang,lunas',
            'status_milestone_100' => 'required|in:pending,hutang,piutang,lunas',

            'tanggal_milestone_20' => 'nullable|date',
            'tanggal_milestone_50' => 'nullable|date',
            'tanggal_milestone_80' => 'nullable|date',
            'tanggal_milestone_100' => 'nullable|date',
        ];
    }

    /**
     * Mengubah data sebelum validasi.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'tanggal_milestone_20' => $this->nullIfEmpty('tanggal_milestone_20'),
            'tanggal_milestone_50' => $this->nullIfEmpty('tanggal_milestone_50'),
            'tanggal_milestone_80' => $this->nullIfEmpty('tanggal_milestone_80'),
            'tanggal_milestone_100' => $this->nullIfEmpty('tanggal_milestone_100'),
        ]);
    }

    private function nullIfEmpty($field)
    {
        return $this->input($field) === '' ? null : $this->input($field);
    }


    public function messages()
    {
        return [
            'partner_id.exists' => 'Partner tidak ditemukan.',
            'status_penajuan_kebutuhan_material.in' => 'Status penajuan kebutuhan material harus berupa: pending, diterima, atau ditolak.',
            'status_inspeksi_logistik.in' => 'Status inspeksi logistik harus berupa: pending, diterima, atau ditolak.',
            'status_ajuhan_upahan.in' => 'Status ajuhan upahan harus berupa: pending, diterima, atau ditolak.',
            'milestone_20' => 'Milestone harus berupa: pending, hutang, piutang, atau lunas',
            'milestone_50' => 'Milestone harus berupa: pending, hutang, piutang, atau lunas',
            'milestone_80' => 'Milestone harus berupa: pending, hutang, piutang, atau lunas',
            'milestone_100' => 'Milestone harus berupa: pending, hutang, piutang, atau lunas',
        ];
    }
}
