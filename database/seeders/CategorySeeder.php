<?php

namespace Database\Seeders;

use App\Models\News\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'group'=>'정책과 법률',
            'name'=>'건강보험'
        ]);
        Category::create([
            'group'=>'정책과 법률',
            'name'=>'의약품'
        ]);
        Category::create([
            'group'=>'정책과 법률',
            'name'=>'의료·약무'
        ]);
        Category::create([
            'group'=>'정책과 법률',
            'name'=>'법령'
        ]);

        Category::create([
            'group'=>'제약바이오',
            'name'=>'기업'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'R&D와 약물'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'허가와 특허'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'유통과 마케팅'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'제약단체'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'바이오 플랫폼 기술을 찾아서'
        ]);
        Category::create([
            'group'=>'제약바이오',
            'name'=>'기업분석'
        ]);

        Category::create([
            'group'=>'병원·약국',
            'name'=>'의약단체'
        ]);
        Category::create([
            'group'=>'병원·약국',
            'name'=>'산업과 경영'
        ]);
        Category::create([
            'group'=>'병원·약국',
            'name'=>'부동산·세무'
        ]);
        Category::create([
            'group'=>'병원·약국',
            'name'=>'사건과 소송'
        ]);
        Category::create([
            'group'=>'병원·약국',
            'name'=>'약학·학술'
        ]);


        Category::create([
            'group'=>'오피니언',
            'name'=>'전문가칼럼'
        ]);
        Category::create([
            'group'=>'오피니언',
            'name'=>'특별기고'
        ]);
        Category::create([
            'group'=>'오피니언',
            'name'=>'데스크시선'
        ]);
        Category::create([
            'group'=>'오피니언',
            'name'=>'기자수첩'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'이슈영상'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'OTC셀링포인트'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'이슈진단'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'팜토크'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'DP 인터뷰'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'급바보'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'DP 초대석'
        ]);
        Category::create([
            'group'=>'영상뉴스',
            'name'=>'알아보잡'
        ]);

        Category::create([
            'group'=>'연재',
            'name'=>'인터뷰'
        ]);
        Category::create([
            'group'=>'연재',
            'name'=>'판결다시보기'
        ]);
        Category::create([
            'group'=>'연재',
            'name'=>'약·담·소'
        ]);
        Category::create([
            'group'=>'연재',
            'name'=>'주목!이약국'
        ]);
        Category::create([
            'group'=>'연재',
            'name'=>'약국핫스팟'
        ]);
        Category::create([
            'group'=>'연재',
            'name'=>'기자 전문 코너'
        ]);
        Category::create([
            'group'=>'기타',
            'name'=>'기타'
        ]);
    }
}
