import React from "react";
import BreadCrumbs from "../../@core/components/breadcrumbs";
import dashboard from "@src/assets/images/dashboard/docs1.svg";

const DashboardPage = () => {
  return (
    <>
      <BreadCrumbs title="My Dashboard" data={[{ title: "Dashboard" }]} />
      <img src={dashboard} alt="dashboard" className="dashboard__image" />
    </>
  );
};

export default DashboardPage;
