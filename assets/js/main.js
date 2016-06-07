var Palette = {
    
    init: function() {
        this.handleClick();
    },

    handleClick: function() {
        var palette = this;
        $('.color').click(function(e) {
            if( palette.copyToClipboard($(this).data('color')) ) {
                palette.showCopiedText($(this));
            }
        });
    },

    copyToClipboard: function(color) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var origSelectionStart, origSelectionEnd;

        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = color;

        // select the content
        var currentFocus = document.activeElement;
        var currentX = window.scrollX, currentY = window.scrollY;
        target.focus();
        window.scrollTo(currentX, currentY);
        target.setSelectionRange(0, target.value.length);
        
        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }

        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        // clear temporary content
        target.textContent = "";

        return succeed;
    },

    showCopiedText: function(color) {
        color.find('em').animate({ 'top': '-64px' }, 250, function() {
            $(this).delay(1000).animate({ 'top': '0px' }, 250);
        });
        color.find('i').animate({ 'top': '-18px' }, 250, function() {
            $(this).delay(1000).animate({ 'top': '+64px' }, 250);
        });
    }

};

Palette.init();