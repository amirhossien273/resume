import "../assets/Helpe.css";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";

const Helpe = () => {

  return (
    <div className="flowchart-container">
      <div className="flowchart">
        {/* مرحله اول */}
        <div className="step">
          <Link to="/asset" className="box">ثبت دارایی</Link>
          <div className="description">
            در این مرحله، کاربر مشخصات دارایی خود را وارد می‌کند. اطلاعات شامل نام دارایی، 
            نوع آن (مانند تجهیزات، نرم‌افزار یا ساختمان)، ارزش مالی و مشخصات دیگری است که 
            برای شناسایی و مدیریت آن نیاز است.
          </div>
        </div>
        <div className="arrow"></div>
        <div className="arrow-down"></div>

        {/* مرحله دوم */}
        <div className="step">
          <Link to="/threats" className="box">ثبت آسیب‌پذیری برای دارایی</Link>
          <div className="description">
            پس از ثبت دارایی، آسیب‌پذیری‌های مرتبط با آن شناسایی و ثبت می‌شوند. این آسیب‌پذیری‌ها 
            ممکن است شامل ضعف‌های امنیتی، نقص‌های طراحی، یا سایر مواردی باشند که احتمالاً دارایی را 
            در معرض خطر قرار می‌دهند.
          </div>
        </div>
        <div className="arrow"></div>
        <div className="arrow-down"></div>

        {/* مرحله سوم */}
        <div className="step">
          <Link to="/vulnerabilities" className="box">ثبت تهدید برای آسیب‌پذیری‌ها</Link>
          <div className="description">
            در این مرحله، تهدیدهای بالقوه‌ای که ممکن است از آسیب‌پذیری‌های ثبت شده سوءاستفاده کنند، 
            مشخص و ثبت می‌شوند. تهدیدها می‌توانند شامل حملات سایبری، بلایای طبیعی یا خطاهای انسانی باشند.
          </div>
        </div>
        <div className="arrow"></div>
        <div className="arrow-down"></div>

        {/* مرحله چهارم */}
        <div className="step">
          <Link to="/ranks" className="box">ثبت پیامد برای تهدیدات</Link>
          <div className="description">
            پیامدهای احتمالی تهدیدات در این مرحله بررسی و ثبت می‌شوند. این پیامدها ممکن است شامل 
            از دست رفتن داده‌ها، خسارات مالی، یا آسیب به اعتبار سازمان باشند. هر تهدید می‌تواند چندین 
            پیامد داشته باشد که باید به طور دقیق بررسی شود.
          </div>
        </div>
        <div className="arrow"></div>
        <div className="arrow-down"></div>

        {/* مرحله نهایی */}
        <div className="step">
          <Link to="/ranks" className="box">پیامد 1</Link>
          <div className="description">
            یک نمونه از پیامدهای ثبت شده که نشان‌دهنده خسارات یا اثرات ناشی از تهدیدات است. این پیامد 
            می‌تواند به صورت کمی (مانند هزینه‌ها) یا کیفی (مانند کاهش اعتماد مشتریان) تعریف شود.
          </div>
        </div>
      </div>
    </div>
  );
};

export default Helpe;
