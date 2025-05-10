<!-- header.php -->
<style>
    #translate-box {
        position: fixed;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.75);
        padding: 12px 16px;
        border-radius: 12px;
        z-index: 9999;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 16px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .goog-te-combo {
        font-size: 18px !important;
        padding: 6px;
        border-radius: 6px;
    }

    .goog-logo-link, .goog-te-gadget span {
        display: none !important;
    }

    /* Ensure iframe is large */
    iframe.goog-te-menu-frame {
        transform: scale(1.5);
        transform-origin: top right;
        z-index: 999999 !important;
    }
</style>

<div id="translate-box" dir="ltr">
    <div id="google_translate_element"></div>
</div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        try {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'es,iw,no', // Using 'iw' instead of 'he' for Hebrew
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: true
            }, 'google_translate_element');
            console.log('Google Translate initialized successfully');
        } catch (error) {
            console.error('Error initializing Google Translate:', error);
        }
    }

    // Add error handling for script loading
    window.onerror = function(msg, url, lineNo, columnNo, error) {
        console.error('Error loading Google Translate:', msg);
        return false;
    };

    // Scale iframe after it loads
    function enlargeIframe() {
        const interval = setInterval(() => {
            const iframe = document.querySelector('iframe.goog-te-menu-frame');
            if (iframe) {
                iframe.style.transform = "scale(1.8)";
                iframe.style.transformOrigin = "top right";
                iframe.style.zIndex = "999999";
                clearInterval(interval);
            }
        }, 300);
    }

    // Re-trigger iframe scaling when dropdown opens
    document.addEventListener('click', (e) => {
        if (e.target.className.includes('goog-te-combo')) {
            setTimeout(enlargeIframe, 300);
        }
    });
</script>

<!-- Load Google Translate script with error handling -->
<script type="text/javascript">
    function loadGoogleTranslate() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        script.onerror = function() {
            console.error('Failed to load Google Translate script');
        };
        document.head.appendChild(script);
    }
    loadGoogleTranslate();
</script>