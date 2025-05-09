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
            'nama_project' => 'sometimes|required|string|max:1024',
            'tanggal_project' => 'nullable|date',
            'estimasi_lama' => 'nullable|integer|min:0',
            'rencana_anggaran_produksi' => 'nullable|integer|min:0',
            'rencana_anggaran_biaya' => 'nullable|integer|min:0',

            'partner_id' => 'nullable|exists:partners,id',

            'jenis_proyek' => 'nullable|array',
            'jenis_proyek.*' => 'exists:project_types,id',

            'status_penajuan_kebutuhan_material' => 'sometimes|boolean',
            'status_inspeksi_logistik' => 'sometimes|boolean',
            'astatus_ajuhan_upahan' => 'sometimes|boolean',
            'milestone_20' => 'sometimes|boolean',
            'milestone_50' => 'sometimes|boolean',
            'milestone_80' => 'sometimes|boolean',
            'milestone_100' => 'sometimes|boolean',
        ];
    }

    /**
     * Mengubah data sebelum validasi.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status_penajuan_kebutuhan_material' => $this->booleanValue('status_penajuan_kebutuhan_material'),
            'status_inspeksi_logistik' => $this->booleanValue('status_inspeksi_logistik'),
            'astatus_ajuhan_upahan' => $this->booleanValue('astatus_ajuhan_upahan'),
            'milestone_20' => $this->booleanValue('milestone_20'),
            'milestone_50' => $this->booleanValue('milestone_50'),
            'milestone_80' => $this->booleanValue('milestone_80'),
            'milestone_100' => $this->booleanValue('milestone_100'),
        ]);
    }

    private function booleanValue($field)
    {
        return filter_var($this->input($field), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
    }

    public function messages()
    {
        return [
            'partner_id.exists' => 'Partner tidak ditemukan.',
        ];
    }
}
