let btns = document.querySelectorAll(".clickable, .logo");
btns = [...btns];
let idc = 1;

let b = false;
btns.forEach(btn=>{
    btn.addEventListener('mousedown',event=>{
        event.preventDefault();
        const target = event.target;
        const id = target.id;
        const selection = window.getSelection();

        if(selection.rangeCount){
            const count = selection.rangeCount-1;
            let range = selection.getRangeAt(count);
            let parentEl = selection.getRangeAt(0).commonAncestorContainer;
            if (parentEl.nodeType != 1) {
                parentEl = parentEl.parentNode;
            }
            if(parentEl.classList.contains("_editable")){
                const range1 = range.cloneRange()
                range.insertNode(document.createTextNode('{{{b}}}'));
                range1.collapse(false);
                range1.insertNode(document.createTextNode('{{{b}}}'));
                normalize(parentEl,b); 
                b = true;  
            }
        }
    },true)
})

const normalize = function(parent,bool) {
    let text = parent.innerHTML, n;
    console.info(parent.tagName);
    if (bool) {
        n = text.replace('{{{b}}}','<strong class="_editable">')
        n = n.replace('{{{b}}}','</strong class="_editable">')
    }else{
        n = text.replace('{{{b}}}','<strong class="_editable">')
        n = n.replace('{{{b}}}','</strong class="_editable">')

    }
    parent.innerHTML = n;
}

// const mainText = document.getElementById("text-area");
// mainText.addEventListener('keydown',event=>{
//     if(event.defaultPrevented){
//         return;
//     }
//     if(event.key == 'Enter'){
//         mainText.innerHTML += "</p>";
//         event.preventDefault();

//     }

// })