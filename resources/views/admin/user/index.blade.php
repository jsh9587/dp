<x-admin-layout>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">유저리스트</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center align-middle">이름</th>
                            <th class="text-center align-middle">이메일</th>
                            <th class="text-center align-middle">직급</th>
                            <th class="text-center align-middle">조직</th>
                            <th class="text-center align-middle">권한</th>
                            <th class="text-center align-middle">상태</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th class="text-center align-middle">이름</th>
                            <th class="text-center align-middle">이메일</th>
                            <th class="text-center align-middle">직급</th>
                            <th class="text-center align-middle">조직</th>
                            <th class="text-center align-middle">권한</th>
                            <th class="text-center align-middle">상태</th>
                            <th class="text-center align-middle"></th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-center align-middle">{{$user->name}}</td>
                                <td class="text-center align-middle">{{$user->email}}</td>
                                <td class="text-center align-middle"></td>
                                <td class="text-center align-middle"></td>
                                <td class="text-center align-middle">{{$user->permits->pluck('name')->implode(',')}}</td>
                                <td class="text-center align-middle"></td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-primary editButton" type="button">
                                        수정
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
