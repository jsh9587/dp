<?php
namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => ['required', 'integer', 'between:1,2'],
            'level_id' => ['required', 'integer'],
            'author_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'flag1_id' => ['nullable', 'integer'],  // Added nullable to make optional
            'flag2_id' => ['nullable', 'integer'],  // Added nullable to make optional
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'list_title' => ['nullable', 'string'],  // Added nullable for optional fields
            'sub_title' => ['nullable', 'string'],   // Added nullable for optional fields
            'content' => ['required', 'string'],
            'hash_tag' => ['required', 'array'],
            'hash_tag.*' => ['string'],  // Ensure each tag is a string
        ];
    }

    /**
     * Modify input data before validation.
     */
    protected function prepareForValidation(): void
    {
        if (is_string($this->hash_tag)) {
            $this->merge([
                'hash_tag' => json_decode($this->hash_tag, true) ?? [],
            ]);
        }
    }

    public function messages(): array
    {
        return [
            'type_id.required' => '기사 타입을 선택해주세요.',
            'type_id.integer' => '기사 타입은 정수형입니다..',
            'type_id.between' => '기사 타입은 자체기사 혹은 보도자료로 선택해주세요.',
            'level_id.required' => '기사 등급을 선택해주세요.',
            'author_id.required' => '기사 작성자는 필수 값 입니다.',
            'name.required' => '기자명은 필수 값 입니다.',
            'category_id.required' => '기사 카테고리는 필수 값 입니다.',
            'title.required' => '기사 제목은 필수 값 입니다.',
            'content.required' => '기사 내용은 필수 값 입니다..',
            'hash_tag.required' => '기사 키워드를 입력해주세요.',
            'hash_tag.*.string' => '기사 키워드는 문자열 입니다.',
        ];
    }
}
