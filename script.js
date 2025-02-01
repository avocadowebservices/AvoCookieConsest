document.addEventListener("DOMContentLoaded", function () {
    const settingsButton = document.getElementById("cookie-settings");
    const settingsModal = document.getElementById("cookie-settings-modal");
    const closeSettingsButton = document.getElementById("close-cookie-settings");
    const acceptCookies = document.getElementById("accept-cookies");
    const rejectCookies = document.getElementById("reject-cookies");
    const saveSettingsButton = document.getElementById("save-cookie-settings");

    if (!localStorage.getItem("cookieConsent")) {
        document.getElementById("cookie-consent-bar").style.display = "flex";
    }

    acceptCookies.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "accepted");
        document.getElementById("cookie-consent-bar").style.display = "none";
    });

    rejectCookies.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "rejected");
        document.getElementById("cookie-consent-bar").style.display = "none";
    });

    settingsButton.addEventListener("click", function () {
        settingsModal.style.display = "block";
    });

    closeSettingsButton.addEventListener("click", function () {
        settingsModal.style.display = "none";
    });

    saveSettingsButton.addEventListener("click", function () {
        localStorage.setItem("cookieSettings", JSON.stringify({
            functional: document.getElementById("functional-cookies").checked,
            analytics: document.getElementById("analytics-cookies").checked,
            marketing: document.getElementById("marketing-cookies").checked,
            thirdParty: document.getElementById("third-party-cookies").checked
        }));
        settingsModal.style.display = "none";
    });
});
