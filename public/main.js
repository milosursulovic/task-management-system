const checkboxes = document.querySelectorAll('.task-completed');

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        checkbox.closest('form').submit();
    });
});
