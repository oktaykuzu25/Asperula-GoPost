$(document).ready(function () {
    var quill = new Quill('#taskdescription', {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'  // or 'bubble'
    });

    $('#addTask').on('click', function (event) {
        event.preventDefault();
        $('.add-tsk').show();
        $('.edit-tsk').hide();
        $('.add-title').show();
        $('.edit-title').hide();
        $('#addTaskModal').modal('show');
        const ps = new PerfectScrollbar('.todo-box-scroll', {
            suppressScrollX: true
        });
    });

    $('#addTaskModal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();
        quill.deleteText(0, 2000);
    });

    $('.input-search').on('keyup', function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.todo-box .todo-item').hide();
        $('.todo-box .todo-item').filter(function () {
            return rex.test($(this).text());
        }).show();
    });

    const taskViewScroll = new PerfectScrollbar('.task-text', {
        wheelSpeed: .5,
        swipeEasing: !0,
        minScrollbarLength: 40,
        maxScrollbarLength: 300,
        suppressScrollX: true
    });

    function dynamicBadgeNotification(setTodoCategoryCount) {
        var todoCategoryCount = setTodoCategoryCount;

        // Get Parents Div(s)
        var get_ParentsDiv = $('.todo-item');
        var get_TodoAllListParentsDiv = $('.todo-item.all-list');
        var get_TodoCompletedListParentsDiv = $('.todo-item.todo-task-done');
        var get_TodoImportantListParentsDiv = $('.todo-item.todo-task-important');

        // Get Parents Div(s) Counts
        var get_TodoListElementsCount = get_TodoAllListParentsDiv.length;
        var get_CompletedTaskElementsCount = get_TodoCompletedListParentsDiv.length;
        var get_ImportantTaskElementsCount = get_TodoImportantListParentsDiv.length;

        // Get Badge Div(s)
        var getBadgeTodoAllListDiv = $('#all-list .todo-badge');
        var getBadgeCompletedTaskListDiv = $('#todo-task-done .todo-badge');
        var getBadgeImportantTaskListDiv = $('#todo-task-important .todo-badge');

        if (todoCategoryCount === 'allList') {
            getBadgeTodoAllListDiv.text(get_TodoListElementsCount);
        } else if (todoCategoryCount === 'completed') {
            getBadgeCompletedTaskListDiv.text(get_CompletedTaskElementsCount);
        } else if (todoCategoryCount === 'important') {
            getBadgeImportantTaskListDiv.text(get_ImportantTaskElementsCount);
        }
    }

    dynamicBadgeNotification('allList');
    dynamicBadgeNotification('completed');
    dynamicBadgeNotification('important');

    const container = document.querySelector('.todo-list-container');
    const ps = new PerfectScrollbar(container, {
        wheelSpeed: .5,
        swipeEasing: !0,
        minScrollbarLength: 40,
        maxScrollbarLength: 300,
        suppressScrollX: true
    });

    // This is where the events would be attached to various buttons or other UI elements.
    // Add your event listeners here.
});

$('#addTaskModal').on('hidden.bs.modal', function (e) {
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
});
