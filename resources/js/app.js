require('./bootstrap');

const dropzones = document.querySelectorAll(".dropzone");
const draggables = document.querySelectorAll(".draggable");

draggables.forEach((draggable) => {
    draggable.addEventListener("dragstart", (e) => {
        draggable.classList.add("opacity-50");
    });

    draggable.addEventListener("dragend", (e) => {
        draggable.classList.remove("opacity-50");
    });
});

dropzones.forEach(dropzone => {
    dropzone.addEventListener("dragover", (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(dropzone, e.clientY);
        const draggable = document.querySelector(".opacity-50");
        if (afterElement === null) {
            dropzone.appendChild(draggable);
        } else {
            dropzone.insertBefore(draggable, afterElement);
        }
    });
});

function getDragAfterElement(container, y) {
    const draggableElements = [
        ...container.querySelectorAll(".draggable:not(.opacity-50)")
    ];

    return draggableElements.reduce(
        (closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;

            if (offset < 0 && offset > closest.offset) {
                return {
                    offset,
                    element: child
                };
            } else {
                return closest;
            }
        },
        { offset: Number.NEGATIVE_INFINITY }
    ).element;
}
