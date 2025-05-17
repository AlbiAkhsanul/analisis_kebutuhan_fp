<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'nama_proyek' => 'sometimes|required|string|max:255',
            'tanggal_proyek' => 'sometimes|required|date',
            'estimasi_lama' => 'sometimes|required|integer|min:0',
            'lokasi' => 'sometimes|required|string|max:1024',
            'rencana_anggaran_produksi' => 'sometimes|required|integer|min:0',
            'rencana_anggaran_biaya' => 'sometimes|required|integer|min:0',

            'partner_id' => 'sometimes|required|exists:partners,id',

            'jenis_proyek' => 'nullable|array',
            'jenis_proyek.*' => 'exists:project_types,id',

            'status_pengajuan_kebutuhan_material' => 'sometimes|required|in:pending,diterima,ditolak',
            'status_inspeksi_logistik' => 'sometimes|required|in:pending,diterima,ditolak',
            'status_ajuhan_upahan' => 'sometimes|required|in:pending,diterima,ditolak',

            'status_proyek' => 'sometimes|required|in:pending,aktif,selesai,batal',

            'status_milestone_20' => 'sometimes|required|in:pending,hutang,piutang,lunas',
            'status_milestone_50' => 'sometimes|required|in:pending,hutang,piutang,lunas',
            'status_milestone_80' => 'sometimes|required|in:pending,hutang,piutang,lunas',
            'status_milestone_100' => 'sometimes|required|in:pending,hutang,piutang,lunas',

            'tanggal_milestone_20' => 'sometimes|nullable|date',
            'tanggal_milestone_50' => 'sometimes|nullable|date',
            'tanggal_milestone_80' => 'sometimes|nullable|date',
            'tanggal_milestone_100' => 'sometimes|nullable|date',

            'invoice.*.file' => 'sometimes|file|mimes:pdf',
            'invoice.*.date' => 'sometimes|date',
            'surat.*.file' => 'sometimes|file|mimes:pdf',
            'surat.*.date' => 'sometimes|date',
            'foto.*.file' => 'sometimes|file|image',
            'foto.*.date' => 'sometimes|date',
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


    private function booleanValue($field)
    {
        return filter_var($this->input($field), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
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
