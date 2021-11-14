function navActive(parentId, childId = null) {
            let parent = document.getElementById(parentId);
            if(childId){
                let child = document.getElementById(childId);
                child.classList.add('active');
            }
            parent.classList.add('active');
        }
