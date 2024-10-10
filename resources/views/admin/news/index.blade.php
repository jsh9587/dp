<x-admin-layout>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        기사리스트
                    </h6>
                    <a class="btn btn-primary" href="{{route('admin.news.create')}}">작성</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center align-middle">타입</th>
                            <th class="text-center align-middle">등급</th>
                            <th class="text-center align-middle">제목</th>
                            <th class="text-center align-middle">작성자</th>
                            <th class="text-center align-middle">작성일</th>
                            <th class="text-center align-middle">상태</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $new)
                            <tr>
                                <td class="text-center align-middle">{{$new->type->name}}</td>
                                <td class="text-center align-middle">{{$new->level->name}}</td>
                                <td class="text-center align-middle">{{$new->title}}</td>
                                <td class="text-center align-middle">{{$new->author->name}}</td>
                                <td class="text-center align-middle">{{$new->created_at}}</td>
                                <td class="text-center align-middle">{{$new->status->name}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('admin.news.show', $new->id) }}" class="btn btn-primary">보기</a>
                                    <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-primary">수정</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $news->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>

    </div>
</x-admin-layout>
