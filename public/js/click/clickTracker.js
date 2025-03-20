function startTracking(webSiteId) {
    const INTERVAL_TIME = 3000 // 3s
    const clicks = []

    const handleClick = (e) => {
        const clickData = {
            x: e.pageX,
            y: e.pageY,
            url: window.location.href,
            web_sites_id: webSiteId,
            window_width: window.innerWidth,
            window_height: window.innerHeight,
            document_width: document.documentElement.scrollWidth,
            document_height: document.documentElement.scrollHeight,
        }

        clicks.push(clickData)
    }

    setInterval(() => {
        if (clicks.length) {
            const backup = [...clicks]
            clicks.length = 0 // отчищаем массив

            fetch("http://127.0.0.1:8000/api/clicks", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify(backup),
            }).catch((error) => {
                console.error("Ошибка:", error)
                clicks.push(...backup)
            })
        }
    }, INTERVAL_TIME)

    document.addEventListener("click", handleClick)
}
