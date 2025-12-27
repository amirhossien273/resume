import React from "react";
import { Card, CardBody } from "reactstrap";
import ProfileComponent from "../../components/users/profileComponent";

const details = () => {

  return (
    <Card className="card col-12 m-auto p-1">
      <CardBody>
        <ProfileComponent></ProfileComponent>
      </CardBody>
    </Card>
  );
};

export default details;
