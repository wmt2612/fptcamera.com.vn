document.addEventListener('DOMContentLoaded', function () {
    const countdownElements = document.querySelectorAll('.sale-countdown-timer');

    countdownElements.forEach(el => {
        const startTimeStr = el.dataset.startTime;
        const endTimeStr = el.dataset.endTime;

        const startTime = startTimeStr ? new Date(startTimeStr) : null;
        const endTime = endTimeStr ? new Date(endTimeStr) : null;

        const updateCountdown = () => {
            const now = new Date();
            const diff = endTime - now;

            // Nếu chưa có endTime, không hiển thị gì cả
            if (!endTime) {
                el.textContent = '';
                clearInterval(el.timer);
                return;
            }

            // Nếu chưa tới startTime (nếu có)
            if (startTime && now < startTime) {
                el.textContent = '';
                return;
            }

            // Nếu đã hết hạn
            if (now >= endTime) {
                el.textContent = 'Đã kết thúc';
                clearInterval(el.timer);
                return;
            }

            const totalSeconds = Math.floor(diff / 1000);
            const days = Math.floor(totalSeconds / (3600 * 24));
            const hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            if (days > 0) {
                el.textContent = `Còn ${String(days).padStart(2, '0')} ngày ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            } else if (hours > 0) {
                el.textContent = `Còn ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            } else {
                el.textContent = `Còn ${String(minutes).padStart(2, '0')} phút ${String(seconds).padStart(2, '0')} giây`;
            }
        };

        // Lưu timer để có thể clear sau
        updateCountdown();
        el.timer = setInterval(updateCountdown, 1000);
    });
});