<x-admin-layout>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://gcore.jsdelivr.net/npm/@yaireo/tagify@latest"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>
    <style>
        .tagify__tag {
            margin-block: 1px;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">기사 작성</h6>
            </div>
            <div class="card-body">
                <form
                    action="@if(isset($news)){{route('admin.news.update', $news->id)}}@else{{route('admin.news.store')}}@endif"
                    method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>타입 <span class="text-danger">*</span></label>
                            <div>
                                @if( $data['newsType'] )
                                    @foreach( $data['newsType'] as $type)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type_id"
                                                   id="type{{$type->id}}"
                                                   value="{{$type->id}}"
                                                   @if( isset($news) && $news->type_id == $type->id ) checked @endif>
                                            <label class="form-check-label"
                                                   for="type{{$type->id}}">{{$type->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>등급 <span class="text-danger">*</span></label>
                            <select class="form-control" name="level_id">
                                <option value="">등급을 선택하세요</option>
                                @if($data['newsLevel'])
                                    @foreach($data['newsLevel'] as $level)
                                        <option value="{{$level->id}}"
                                                @if( isset($news) && $news->level_id == $level->id ) selected @endif>{{$level->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label>기자명 <span class="text-danger">*</span></label>
                            <div class="input-group" id="authorField">
                                <input type="hidden" name="author_id" class="authors"
                                       value="@if( isset($news) ) {{$news->author_id}} @else {{Auth::user()->id}} @endif">
                                <input type="text" class="form-control" readonly name="name"
                                       value="@if( isset($news) ){{$news->name}}@else{{Auth::user()->name}} 기자@endif"
                                       placeholder="기자명을 입력하세요">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary modifyAuthor" type="button">기자수정</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Flag1</label>
                            <select class="form-control" name="flag1_id">
                                <option value="">Flag를 선택하세요.</option>
                                @if( $data['flag1'] )
                                    @foreach($data['flag1'] as $flag)
                                        <option value="{{$flag->id}}"
                                                @if(isset($news)&&$news->flag1_id == $flag->id) selected @endif>{{$flag->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label>Flag2</label>
                            <select class="form-control" name="flag2_id">
                                <option value="">Flag를 선택하세요.</option>
                                @if( $data['flag2'] )
                                    @foreach($data['flag2'] as $flag)
                                        <option value="{{$flag->id}}"
                                                @if(isset($news)&&$news->flag2_id == $flag->id) selected @endif>{{$flag->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label>카테고리 <span class="text-danger">*</span></label>
                            <!-- Select Dropdown -->
                            <select name="category_id" class="form-control selectpicker" id="category"
                                    data-live-search="true">
                                <option value="">선택해주세요.</option>
                                @php
                                    $currentGroup = null;
                                @endphp
                                @foreach ($data['categories'] as $category)
                                    @if ($currentGroup !== $category->group)
                                        @if ($currentGroup !== null)
                                            </optgroup>
                                @endif
                                <optgroup label="{{ $category->group }}">
                                    @php
                                        $currentGroup = $category->group;
                                    @endphp
                                    @endif
                                    <option value="{{ $category->id }}"
                                            @if(isset($news)&&$news->categories->contains('id', $category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                    @if ($currentGroup !== null)
                                </optgroup>
                                @endif
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>제목 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="제목을 입력해주세요"
                                   value="@if(isset($news)){{$news->title}} @endif">
                        </div>
                        <div class="form-group col-md-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>리스트 출력제목</label>
                            <input type="text" class="form-control" name="list_title" id="list_title"
                                   placeholder="리스트 제목을 입력해주세요" value="@if(isset($news)){{$news->list_title}} @endif">
                        </div>
                        <div class="form-group col-md-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>부제목</label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                   placeholder="부제목을 입력해주세요" value="@if(isset($news)){{$news->sub_title}}@endif">
                        </div>
                        <div class="form-group col-md-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>본문작성 <span class="text-danger">*</span></label>
                            <textarea name="content" class="editor">@if(isset($news))
                                    {{$news->content}}
                                @endif</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>키워드 <span class="text-danger">*</span></label>
                            <input name="tags" type="text" class="form-control" placeholder="키워드를 입력해 주세요"
                                   value="@if(isset($news)){{ implode(',', $news->hashtags->pluck('hash_tag')->toArray()) }}@endif"
                                   tabindex="-1">
                            <input type="hidden" name="hash_tag" id="hash_tag"
                                   value='@if(isset($news)){{ json_encode($news->hashtags->pluck('hash_tag')->toArray(), JSON_UNESCAPED_UNICODE) }}@endif'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>관련기사</label>
                            <div>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th class="text-center align-middle">기사제목</th>
                                        <th class="text-center align-middle">
                                            <button class="btn btn-primary addRelationNewsButton"
                                                    type="button">추가
                                            </button>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if(isset($news))
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>히스토리</label>
                                <div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center align-middle">날짜</th>
                                            <th class="text-center align-middle"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news->history as $history)
                                            <tr>
                                                <td class="text-center align-middle">{{$history->created_at}}</td>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-primary historyButton"
                                                            history_id="{{$history->id}}" type="button">비교하기
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary" id="submitButton" type="submit">
                                생성
                            </button>
                            <button class="btn btn-primary" type="button" onclick="history.back();">
                                취소
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--ck-->
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                this.saveInterval = 500;
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                xhr.open('POST', '/imageUpload', true);
                xhr.responseType = 'json';

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            }

            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${file.name}.`;

                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }

                    resolve({default: response.url});
                });

                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            _sendRequest(file) {
                const data = new FormData();
                data.append('upload', file);
                this.xhr.send(data);
            }
        }

        // HTML 요소가 존재하는지 확인
        document.addEventListener('DOMContentLoaded', function () {

            const watchdog = new CKSource.Watchdog();
            window.watchdog = watchdog;

            watchdog.setCreator((element, config) => {
                return CKSource.Editor.create(element, config).then(editor => {
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return new MyUploadAdapter(loader);
                    };
                    console.log("CKEditor가 성공적으로 초기화되었습니다."); // 확인용 로그
                    console.log("생성된 CKEditor 인스턴스:", editor); // 생성된 인스턴스 로그
                    return editor; // CKEditor 인스턴스를 반환
                }).catch(error => {
                    console.error('CKEditor 생성 중 오류 발생:', error);
                });
            });

            watchdog.setDestructor(editor => {
                return editor.destroy();
            });

            watchdog.on('error', handleError);


            const editorElement = document.querySelector('.editor');
            if (!editorElement) {
                console.error('에디터 요소를 찾을 수 없습니다. 클래스가 ".editor"인지 확인하세요.');
            } else {
                // create 메서드는 setCreator의 결과가 완료된 후에 호출됩니다.
                watchdog.create(editorElement, {
                    width: "500px",
                    removePlugins: ['Title'],
                    placeholder: '기사내용을 작성해주세요.',
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'fontFamily',
                            'fontSize',
                            'bold',
                            'underline',
                            'italic',
                            'link',
                            'specialCharacters',
                            'highlight',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'imageUpload',
                            'imageInsert',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'undo',
                            'redo',
                            '-',
                            'alignment',
                            'horizontalLine'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    language: 'en-gb',
                    image: {
                        styles: ['alignLeft', 'alignCenter', 'alignRight'],
                        toolbar: [
                            'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                            'linkImage'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn', 'tableRow', 'mergeTableCells',
                            'tableCellProperties', 'tableProperties'
                        ]
                    }
                })
                    .then(() => {
                        // 여기에 있는 editor는 위에서 반환된 인스턴스입니다.
                        console.log(watchdog);
                        const editor = watchdog['_data']['main'];
                        console.log("최종 CKEditor 인스턴스:", editor);

                    })
                    .catch(handleError);
            }
        });

        function handleError(error) {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: vr3t4kot1bs2-dmw0ilm8x0mh');
            console.error(error);
        }
    </script>

    <!--ck-->

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const input = document.querySelector('input[name=tags]');
            const hiddenInput = document.getElementById('hash_tag');
            const tagify = new Tagify(input);
            let tagArray = [];  // 최종 태그를 저장할 배열
            if (hiddenInput.value !== '') {
                tagArray = JSON.parse(hiddenInput.value);
                // Tagify에 초기 태그를 추가
                tagArray.forEach(tag => {
                    tagify.addTags(tag);
                });
            }
            tagify.on('add', function (e) {
                const tagValue = e.detail.data.value;  // 추가된 태그 값
                tagArray.push(tagValue);  // 배열에 태그 추가
                // hidden input 필드 업데이트
                hiddenInput.value = JSON.stringify(tagArray);
            });

            tagify.on('remove', function (e) {
                const tagValue = e.detail.data.value;  // 제거된 태그 값
                tagArray = tagArray.filter(tag => tag !== tagValue);  // 배열에서 태그 제거
                // hidden input 필드 업데이트
                hiddenInput.value = JSON.stringify(tagArray);
            });
        });
    </script>
    <!-- /.container-fluid -->
    @include("admin.news.modals.add-author")
    @if(isset($news))
        @include("admin.news.modals.history")
    @endif
</x-admin-layout>
