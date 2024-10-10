<x-admin-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">기사 보기</h6>
            </div>
            <div class="card-body">
                타이틀:{{$news->title}}<br>
                내용:{!!$news->content!!}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</x-admin-layout>
