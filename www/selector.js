/*
create an overlay selector for the given buttonElementId, fieldElementId,
default option, and an array of possible options. when the button element is
clicked, a full-screen selector is displayed. the default option must exist in
the array of possible options.

when a selection is clicked, the selector is removed and the innerHTML of
the button and the field are changed to the value of the clicked selection.

example: createSelector("food-label","food-hidden-textarea","orange",["orange",
    "banana","apricot","pineapple","peach"])
*/
function createSelector(buttonElementId,fieldElementId,defaultOpt,opts) {
    var element = document.getElementById(buttonElementId);
    var field = document.getElementById(fieldElementId);
    var baseErrorString = "could not create selector for " + buttonElementId + "; ";

    // assertions
    if (!element)
        throw new Error("no element with id " + buttonElementId + "exists");
    if (!field)
        throw new Error("no element with id " + fieldElementId + "exists");
    if (!(opts instanceof Array))
        throw new Error(baseErrorString + "opts is not an array");
    if (opts.indexOf(defaultOpt) == -1)
        throw new Error(baseErrorString + defaultOpt + " is not an element of opts");
    else
        element.innerHTML = defaultOpt;

    element.onclick = function() {
        var overlay = document.getElementById("selector-overlay");
        currentOpt = element.innerHTML;

        // create a full page overlay
        if (!overlay) {
            overlay = document.createElement("div");
            overlay.setAttribute("id","selector-overlay");
            document.body.appendChild(overlay);

            var container = document.createElement("div");
            container.setAttribute("id","selector-container");
            overlay.appendChild(container);

            // function to create a single selection in the selector menu
            function createSelection(opt,classAttribute) {
                var button = document.createElement("div");
                button.setAttribute("class",classAttribute);
                button.innerHTML = opt;
                button.onclick = function() {
                    document.body.removeChild(overlay);
                    element.innerHTML = opt;
                    field.innerHTML = opt;
                }
                container.appendChild(button);
            }

            // iterate through possible options, creating selections for each
            for (var i = 0; i < opts.length; i++) {
                if (opts[i] == currentOpt)
                    createSelection(opts[i],"label label-green");
                else
                    createSelection(opts[i],"label label-blue");
            }
        }
    }

    console.log("created selector for " + buttonElementId);
}
