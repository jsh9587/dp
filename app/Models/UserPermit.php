<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermit extends Model
{
    use HasFactory;

    protected $table = 'user_permit';

    public $incrementing = false; // 자동 증가 사용 안 함

    protected $fillable = [
        'permit_id',
        'user_id'
    ];

    // 복합 기본 키 설정
    public function getKeyName()
    {
        return 'permit_id,user_id'; // 복합 키 이름
    }

    public function setKeyName($keyName)
    {
        // 기본 키를 설정합니다. 필요하지 않을 경우 무시할 수 있습니다.
    }

    public function isKey($value)
    {
        return in_array($value, [$this->permit_id, $this->user_id]);
    }

    // 다른 모델 관계 정의
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permit()
    {
        return $this->belongsTo(Permit::class);
    }
}
