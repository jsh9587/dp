<div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 97%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">기사 비교</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>히스토리 기사</h6>
                        <div class="article-content" id="history">

                        </div>
                    </div>
                    <!-- Second Article Section -->
                    <div class="col-md-6">
                        <h6>현재 기사</h6>
                        <div class="article-content" id="now">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">확인</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/diff@7.0.0/dist/diff.min.js"></script>
<script>
    const HistoryButton = document.querySelectorAll('.historyButton');
    const HistoryModal = document.querySelector('#historyModal');
    const HistoryField = document.querySelector('#history');
    const HistoryModalCloseButton = HistoryModal.querySelector('.modal-footer .btn');
    const NowField = document.querySelector('#now');
    if (HistoryButton) {
        HistoryButton.forEach(function (item) {
            item.addEventListener('click', function () {
                $(HistoryModal).modal('show');
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/admin/news/getHistory",
                    data: {
                        id: item.getAttribute('history_id')
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Retrieve the token from the meta tag
                    },
                    success: function (result) {
                        HistoryField.innerHTML = result['previous_content']; // Replaces the content with HTML
                        // CKEditor 인스턴스가 존재하는지 확인
                        if (watchdog) {
                            var oldText = removeFigcaption(result['previous_content']);
                            var newText = removeFigcaption(watchdog['_data']['main']);
                            var diff = Diff.diffWords(oldText, newText);

                            var display = diff.map(function(part){
                                // 삽입된 부분은 녹색, 삭제된 부분은 빨간색으로 표시
                                var color = part.added ? 'green' : part.removed ? 'red' : 'black';
                                return '<span style="color:' + color + '">' + part.value + '</span>';
                            }).join('');
                            NowField.innerHTML = display; // 현재 편집 중인 내용을 보여줌
                        } else {
                            console.error("CKEditor가 초기화되지 않았습니다.");
                        }
                        // 두 기사 내용

                    },
                    error: function (result) {
                    },
                    complete: function (result) {
                    },
                    beforeSend: function (result) {
                    }
                });
            });
        });
    }
    function removeFigcaption(html) {
        return html.replace(/<figcaption[\s\S]*?<\/figcaption>/gi, '');
    }
    if (HistoryModalCloseButton) {
        HistoryModalCloseButton.addEventListener('click', function () {
            $(HistoryModal).modal('hide');
        })
    }

</script>
