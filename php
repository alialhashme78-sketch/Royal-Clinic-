<?php
// PHP الحفاظ على بنية 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITE DENTAL | النسخة الملكية المطورة</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Tajawal:wght@200;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gold: #d4af37;
            --bright-gold: #f9d976;
            --deep-black: #0a0a0a;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(212, 175, 55, 0.3);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; cursor: none !important; }

        body {
            font-family: 'Tajawal', sans-serif;
            background: var(--deep-black);
            color: #fff;
            overflow-x: hidden;
            background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%);
        }

        /* الماوس */
        #custom-cursor { position: fixed; width: 10px; height: 10px; background: var(--gold); border-radius: 50%; pointer-events: none; z-index: 10000; }
        #cursor-follower { position: fixed; width: 45px; height: 45px; border: 1px solid var(--gold); border-radius: 50%; pointer-events: none; z-index: 9999; transition: transform 0.1s; }

        /* زر الواتساب العائم الجديد */
        .whatsapp-float {
            position: fixed; bottom: 30px; left: 30px; 
            width: 65px; height: 65px; background: #25d366; 
            border-radius: 50%; display: flex; justify-content: center; 
            align-items: center; font-size: 30px; color: #fff; 
            z-index: 9998; box-shadow: 0 10px 30px rgba(37, 211, 102, 0.4);
            animation: pulse 2s infinite; text-decoration: none;
        }

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 20px rgba(37, 211, 102, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        #intro-overlay { position: fixed; inset: 0; background: #000; z-index: 10001; display: flex; justify-content: center; align-items: center; }
        .intro-text { font-family: 'Cinzel', serif; font-size: 3.5vw; color: var(--gold); opacity: 0; letter-spacing: 15px; }

        #webgl-canvas { position: fixed; top: 0; left: 0; z-index: -1; }

        header { position: fixed; top: 0; width: 100%; padding: 30px 6%; display: flex; justify-content: space-between; align-items: center; z-index: 1000; }
        .logo { font-family: 'Cinzel', serif; font-size: 1.8rem; font-weight: 700; color: var(--gold); text-shadow: 0 0 15px var(--gold); }

        .nav-links { display: flex; gap: 40px; background: rgba(255,255,255,0.02); padding: 10px 35px; border-radius: 50px; border: 1px solid var(--glass-border); backdrop-filter: blur(15px); }
        .nav-links a { color: #fff; text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .nav-links a:hover { color: var(--gold); text-shadow: 0 0 10px var(--gold); }

        section { min-height: 100vh; padding: 120px 10%; display: flex; flex-direction: column; justify-content: center; }
        
        .hero-content h1 { font-size: 7rem; line-height: 0.8; font-weight: 900; }
        .hero-content span { font-family: 'Cinzel', serif; font-size: 2.5rem; color: var(--gold); display: block; margin-top: 15px; }

        /* الكروت المطورة */
        .service-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; margin-top: 60px; }
        .service-card { 
            padding: 50px 30px; background: var(--glass-bg); 
            border: 1px solid rgba(212, 175, 55, 0.1); border-radius: 40px; 
            transition: 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275); backdrop-filter: blur(10px); 
        }
        .service-card:hover { transform: translateY(-20px) rotateY(10deg); border-color: var(--gold); box-shadow: 0 30px 60px rgba(0,0,0,0.5); }
        .service-card i { font-size: 3rem; color: var(--gold); margin-bottom: 25px; display: block; }
        .service-card h3 { color: var(--gold); margin-bottom: 12px; font-size: 1.5rem; }

        /* قسم الحجز الملكي */
        .booking-container {
            background: rgba(10, 10, 10, 0.8);
            border: 1px solid var(--glass-border);
            border-radius: 60px;
            padding: 80px;
            backdrop-filter: blur(30px);
            display: grid; grid-template-columns: 1fr 1.2fr; gap: 80px;
            position: relative; box-shadow: 0 50px 100px rgba(0,0,0,0.8);
        }

        .input-group { position: relative; margin-bottom: 35px; }
        .input-group i { position: absolute; right: 25px; top: 50%; transform: translateY(-50%); color: var(--gold); }
        
        .form-control {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 20px;
            width: 100%; padding: 22px 60px 22px 25px;
            color: #fff; font-size: 1.1rem; outline: none; transition: 0.4s;
        }
        .form-control:focus { border-color: var(--gold); box-shadow: 0 0 25px rgba(212,175,55,0.3); background: rgba(255,255,255,0.07); }

        .btn-main { 
            width: 100%; padding: 25px; 
            background: linear-gradient(45deg, var(--gold), var(--bright-gold)); 
            border: none; font-size: 1.3rem; font-weight: 900; 
            border-radius: 20px; transition: 0.5s; cursor: none;
        }
        .btn-main:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(212,175,55,0.4); }

        footer { padding: 100px 10% 50px; background: rgba(0,0,0,0.5); border-top: 1px solid var(--glass-border); }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 50px; margin-bottom: 50px; }
        .footer-grid h4 { color: var(--gold); margin-bottom: 20px; font-family: 'Cinzel'; }
        .footer-grid p { opacity: 0.6; font-size: 0.9rem; margin-bottom: 10px; }

        @media (max-width: 1024px) {
            .hero-content h1 { font-size: 3.5rem; }
            .booking-container { grid-template-columns: 1fr; padding: 40px; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <div id="custom-cursor"></div>
    <div id="cursor-follower"></div>

    <a href="https://wa.me/967738505260" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <div id="intro-overlay">
        <div class="intro-text">ELITE DENTAL</div>
    </div>

    <canvas id="webgl-canvas"></canvas>

    <header>
        <div class="logo">ELITE</div>
        <nav class="nav-links">
            <a href="#home">الرئيسية</a>
            <a href="#services">الخدمات الملكية</a>
            <a href="https://www.instagram.com/2s.2sr?igsh=MTlsN3VlaWd4MWdkbQ==" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#booking">طلب حجز</a>
        </nav>
        <div class="logo">DENTAL</div>
    </header>

    <section id="home">
        <div class="hero-content">
            <h1 id="hero-title">Experience <br> <span>The Royalty</span></h1>
            <p style="font-size: 1.4rem; opacity: 0.8; margin: 40px 0; max-width: 650px; line-height: 1.8;">نحن لا نصنع ابتسامات فحسب، نحن نصنع هويتك الجديدة عبر الفن والابتكار الرقمي.</p>
            <button class="btn-main" style="width:auto; padding: 25px 60px;" onclick="document.getElementById('booking').scrollIntoView()">استكشف عالمك الخاص</button>
        </div>
    </section>

    <section id="services">
        <h2 style="text-align: center; font-size: 3.5rem; margin-bottom: 60px; font-family: 'Cinzel'; color: var(--gold);">الخدمات <span style="color:#fff">الملكية</span></h2>
        <div class="service-grid">
            <div class="service-card"><i class="fas fa-crown"></i><h3>ابتسامة هوليوود</h3><p>تصميم رقمي ثلاثي الأبعاد لابتسامتك المستقبلية.</p></div>
            <div class="service-card"><i class="fas fa-tooth"></i><h3>زراعة النخبة</h3><p>أحدث الغرسات العالمية بضمان مدى الحياة.</p></div>
            <div class="service-card"><i class="fas fa-magic"></i><h3>تبييض ملكي</h3><p>إشراقة فورية باستخدام تقنية الفلاش البارد.</p></div>
            <div class="service-card"><i class="fas fa-align-center"></i><h3>التقويم اللامرئي</h3><p>تصحيح احترافي بدون أي أسلاك ظاهرة.</p></div>
            <div class="service-card"><i class="fas fa-microscope"></i><h3>علاج الجذور</h3><p>عناية ميكروسكوبية تضمن إنقاذ أسنانك الطبيعية.</p></div>
            <div class="service-card"><i class="fas fa-gem"></i><h3>تجميل اللثة</h3><p>نحت اللثة بالليزر لتناسق جمالي مذهل.</p></div>
            <div class="service-card"><i class="fas fa-child"></i><h3>قسم الصغار</h3><p>عناية ترفيهية تجعل طفلك يحب طبيب الأسنان.</p></div>
            <div class="service-card"><i class="fas fa-user-shield"></i><h3>عناية VIP</h3><p>برنامج وقاية دوري حصري لعملاء النخبة.</p></div>
        </div>
    </section>

    <section id="booking">
        <div class="booking-container">
            <div>
                <h2 style="font-size: 4rem; color: var(--gold); line-height: 1;">احجز <br> <span style="color:#fff">مقعدك الآن</span></h2>
                <p style="margin-top: 30px; opacity: 0.7; font-size: 1.1rem;">اترك بياناتك وسنقوم بترتيب زيارة ملكية تليق بك في أقرب وقت ممكن.</p>
                <div style="margin-top: 50px;">
                    <a href="https://www.instagram.com/2s.2sr?igsh=MTlsN3VlaWd4MWdkbQ==" target="_blank" style="color: var(--gold); text-decoration: none; font-size: 1.3rem; display: flex; align-items: center; gap: 15px;">
                        <i class="fab fa-instagram" style="font-size: 2.5rem;"></i> ELITE.DENTAL
                    </a>
                </div>
            </div>
            <form id="royalForm">
                <div class="input-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" id="r_name" class="form-control" placeholder="الاسم الكامل" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-star"></i>
                    <select id="r_service" class="form-control">
                        <option value="استشارة VIP">نوع الخدمة المطلوبة</option>
                        <option value="ابتسامة هوليوود">ابتسامة هوليوود</option>
                        <option value="زراعة أسنان">زراعة أسنان</option>
                        <option value="تقويم شفاف">تقويم شفاف</option>
                    </select>
                </div>
                <button type="button" class="btn-main" onclick="sendRoyalWhatsapp()">
                    <i class="fab fa-whatsapp"></i> إرسال الطلب الملكي
                </button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer-grid">
            <div><h4>ELITE DENTAL</h4><p>الفخامة هي عنواننا والكمال هو هدفنا.</p></div>
            <div><h4>أوقات العمل</h4><p>السبت - الخميس</p><p>9:00 صباحاً - 9:00 مساءً</p></div>
            <div><h4>اتصل بنا</h4><p>+967 738505260</p><p>تعز - شارع جمال</p></div>
            <div><h4>تابعنا</h4>
                <a href="https://www.instagram.com/2s.2sr?igsh=MTlsN3VlaWd4MWdkbQ==" style="color:var(--gold); font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <p style="text-align: center; opacity: 0.3; margin-top: 50px;">© 2026 جميع الحقوق محفوظة لعيادة إيليت</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        const cursor = document.getElementById('custom-cursor');
        const follower = document.getElementById('cursor-follower');
        document.addEventListener('mousemove', (e) => {
            gsap.to(cursor, {x: e.clientX, y: e.clientY, duration: 0});
            gsap.to(follower, {x: e.clientX - 22, y: e.clientY - 22, duration: 0.15});
        });

        window.addEventListener('load', () => {
            gsap.to(".intro-text", { opacity: 1, duration: 1, letterSpacing: "5px" });
            gsap.to("#intro-overlay", { y: "-100%", duration: 1.2, delay: 1, ease: "expo.inOut" });
        });

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('webgl-canvas'), antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        const starGeo = new THREE.BufferGeometry();
        const starCoords = [];
        for(let i=0; i<15000; i++) {
            starCoords.push(Math.random()*1000-500, Math.random()*1000-500, Math.random()*1000-500);
        }
        starGeo.setAttribute('position', new THREE.Float32BufferAttribute(starCoords, 3));
        const starMat = new THREE.PointsMaterial({ color: 0xd4af37, size: 0.7 });
        const starMesh = new THREE.Points(starGeo, starMat);
        scene.add(starMesh);
        camera.position.z = 1;

        function animate() {
            requestAnimationFrame(animate);
            starMesh.rotation.y += 0.0005;
            starMesh.position.z = window.scrollY * 0.2; // البارالاكس المطلوب
            renderer.render(scene, camera);
        }
        animate();

        function sendRoyalWhatsapp() {
            const name = document.getElementById('r_name').value;
            const service = document.getElementById('r_service').value;
            if(!name) { alert("لطفاً أدخل اسمك الكريم"); return; }
            const msg = encodeURIComponent(`مرحباً إيليت دينتال، أنا ${name}. أرغب بحجز موعد VIP لخدمة: ${service}`);
            window.open(`https://wa.me/967738505260?text=${msg}`, '_blank');
        }

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
</body>
</html>
