function navActive(parentId, childId = null) {
            let parent = document.getElementById(parentId);
            let child = document.getElementById(childId);
            parent.classList.add('active');
            child.classList.add('active');
        }
