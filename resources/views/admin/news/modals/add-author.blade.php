<div class="modal fade" id="authorModal" tabindex="-1" aria-labelledby="authorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authorModalLabel">기자 수정</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="addAuthor" id="addAuthor1"
                                       value="0" onclick="changeMode(1);">
                                <label class="form-check-label" for="addAuthor1">직접입력</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="addAuthor" id="addAuthor2"
                                       value="1" checked onclick="changeMode(2);">
                                <label class="form-check-label" for="addAuthor2">기자선택</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 select-name1" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="col-form-label">직접입력</label>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle">기자명</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" id="insertName">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group mb-3 select-name2">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="col-form-label">기자선택</label>
                            <input type="text" id="searchInput" class="form-control" placeholder="검색어를 입력해주세요"
                                   style="width: 250px;" onkeyup="filterAuthors()">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle">
                                        <input type="checkbox" class="form-check" id="selectAll" onclick="toggleCheckboxes(this);">
                                    </th>
                                    <th class="text-center align-middle">팀명</th>
                                    <th class="text-center align-middle">기자명</th>
                                    <th class="text-center align-middle">이메일</th>
                                </tr>
                                </thead>
                                <tbody id="authorsTableBody">
                                @foreach($data['authors'] as $author)
                                    <tr>
                                        <td class="text-center align-middle" >
                                            <input class="form-check  individual-checkbox" type="checkbox" value="{{ $author->id }}">
                                            <input type="hidden" class="author_name" value="{{ $author->name }}">
                                            <input type="hidden" class="author_id" value="{{ $author->id }}">
                                        </td>
                                        <td class="text-center align-middle">{{ $author->team_name }}</td>
                                        <td class="text-center align-middle">{{ $author->name }}</td>
                                        <td class="text-center align-middle">{{ $author->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-primary" onclick="addSelectedAuthors();" >추가</button>
                            <button type="button" class="btn btn-danger ml-1" onclick="deleteSelectedAuthors();">삭제</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">선택 기자</label>
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center align-middle">
                                    <input type="checkbox" class="form-check">
                                </th>
                                <th class="text-center align-middle">팀명</th>
                                <th class="text-center align-middle">기자명</th>
                                <th class="text-center align-middle">이메일</th>
                            </tr>
                            </thead>
                            <tbody id="selectedAuthorsTableBody">
                                <tr>
                                    <td class="text-center align-middle" colspan="4">기자를 선택 혹은 입력 해주세요</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                <button type="button" class="btn btn-primary" onclick="applySelectedAuthors();">적용</button>
            </div>
        </div>
    </div>
</div>
<script>
    const modifyAuthorButton = document.querySelector('.modifyAuthor');
    const authorModal = document.querySelector('#authorModal');
    if (modifyAuthorButton) {
        modifyAuthorButton.addEventListener('click', function () {
            $(authorModal).modal('show');
        });
    }

    function toggleCheckboxes(masterCheckbox) {
        // Get all individual checkboxes
        const checkboxes = document.querySelectorAll('.individual-checkbox');

        // Set the checked property of each checkbox based on the master checkbox
        checkboxes.forEach(checkbox => {
            checkbox.checked = masterCheckbox.checked;
        });
    }
    function filterAuthors() {
        // Get the value from the search input
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#authorsTableBody tr');

        rows.forEach(row => {
            const teamName = row.cells[1].textContent.toLowerCase();
            const authorName = row.cells[2].textContent.toLowerCase();
            const email = row.cells[3].textContent.toLowerCase();

            // Check if any of the cells match the search input
            if (teamName.includes(searchInput) || authorName.includes(searchInput) || email.includes(searchInput)) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    }
    function addSelectedAuthors() {
        const selectedAuthorsTableBody = document.getElementById('selectedAuthorsTableBody');
        const rows = document.querySelectorAll('#authorsTableBody tr');

        // Clear previous selections in the selected authors table
        selectedAuthorsTableBody.innerHTML = '';

        rows.forEach(row => {
            const checkbox = row.querySelector('.individual-checkbox');

            if (checkbox.checked) {
                const newRow = row.cloneNode(true); // Clone the selected row
                selectedAuthorsTableBody.appendChild(newRow); // Add to selected authors table
            }
        });

        // Check if directly inputted values are used
        const insertName = document.getElementById('insertName').value;
        //const insertEmail = document.getElementById('insertEmail').value;

        if (insertName) {
            // Create a new row for the directly inputted author
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
            <td class="text-center align-middle">
                <input type="checkbox" class="form-check individual-checkbox" checked>
            </td>
            <td class="text-center align-middle">직접입력</td>
            <td class="text-center align-middle">${insertName}</td>
            <td class="text-center align-middle"></td>
        `;

            selectedAuthorsTableBody.appendChild(newRow);
        }

        // If no authors are selected, show a message
        if (selectedAuthorsTableBody.children.length === 0) {
            selectedAuthorsTableBody.innerHTML = '<tr><td class="text-center align-middle" colspan="4">기자를 선택 혹은 입력 해주세요</td></tr>';
        }
    }

    function applySelectedAuthors() {
        const selectedAuthorsTableBody = document.getElementById('selectedAuthorsTableBody');
        const rows = selectedAuthorsTableBody.querySelectorAll('tr');

        // Get the author field container
        const authorField = document.getElementById('authorField');

        // Clear existing author_id hidden inputs and author_name input
        const existingAuthorIds = authorField.querySelectorAll('input.authors');
        existingAuthorIds.forEach(input => input.remove());

        const authorNameInput = authorField.querySelector('input[name="name"]');
        authorNameInput.value = ''; // Clear previous author names

        // Initialize an array to hold selected authors' IDs and names
        const authorIds = [];
        let authorNames = '';

        // Iterate through each row in the selected authors table
        rows.forEach(row => {
            const authorNameInputElement = row.querySelector('.author_name');
            // Check if the row contains author_name and author_id inputs
            if (authorNameInputElement) {
                const authorName = authorNameInputElement.value; // Get the value of author_name
                // Append the author's name for display
                authorNames += authorName + ' 기자, ';
            } else {
                // Handle directly inputted author
                const authorName = row.cells[2].textContent;
                authorNames += authorName + ' 기자, ';
            }
        });
        // Set the text input for author names (trim trailing comma and space)
        authorNameInput.value = authorNames.slice(0, -2); // Remove last comma and space
        $(authorModal).modal('hide');
    }

    function deleteSelectedAuthors() {
        const selectedAuthorsTableBody = document.getElementById('selectedAuthorsTableBody');
        const rows = selectedAuthorsTableBody.querySelectorAll('tr');
        rows.forEach(row => {
            const checkbox = row.querySelector('.form-check');

            if (checkbox && checkbox.checked) {
                selectedAuthorsTableBody.removeChild(row); // Remove checked row
            }
        });
        // If no authors are left, show the default message
        if (selectedAuthorsTableBody.children.length === 0) {
            selectedAuthorsTableBody.innerHTML = '<tr><td class="text-center align-middle" colspan="4">기자를 선택 혹은 입력 해주세요</td></tr>';
        }
    }


    function changeMode( mode ){
        if( mode === 1){
            $('.select-name1').show();
            $('.select-name2').hide();
        }else{
            $('.select-name1').hide();
            $('.select-name2').show();
        }
    }
</script>
