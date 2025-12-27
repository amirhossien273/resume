import { useSelector } from "react-redux";
import { Col, Row } from "reactstrap";

const ProfileComponent = () => {
    const { auth } = useSelector((s) => s);
    
    return (
        <Row className="m-auto">
            <Col className="col-6 mt-2">
            <span style={{color: "#8b8b8b"}}>نام و نام خانوادگی: </span>
            <span style={{fontWeight: "bold"}}>{auth.user?.name} {auth.user?.lastName} </span>
            </Col>
            <Col className="col-6 mt-2">
            <span style={{color: "#8b8b8b"}}>شماره همراه: </span>
            <span style={{fontWeight: "bold"}}>{auth.user?.phone}</span>
            </Col>
            <Col className="col-6 mt-2">
            <span style={{color: "#8b8b8b"}}>کد ملی: </span>
            <span style={{fontWeight: "bold"}}>{auth.user?.nationalCode}</span>
            </Col>
            <Col className="col-6 mt-2">
            <span style={{color: "#8b8b8b"}}>سمت: </span>
            <span style={{fontWeight: "bold"}}>{auth.user?.roles[0].name == "ROLE_ADMIN" ? "مدیر کل" : `کارشناس ${auth.user?.group[0].name}` }</span>
            </Col>
      </Row>
    )
}

export default ProfileComponent;