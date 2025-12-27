// ** React Imports
import { Link, useNavigate } from "react-router-dom";

// ** Custom Components
import Avatar from "@components/avatar";

// ** Third Party Components
import {
  User,
  Mail,
  CheckSquare,
  MessageSquare,
  Settings,
  CreditCard,
  Power,
} from "react-feather";

// ** Reactstrap Imports
import {
  UncontrolledDropdown,
  DropdownMenu,
  DropdownToggle,
  DropdownItem,
} from "reactstrap";

// ** Default Avatar Image
import defaultAvatar from "../../../../assets/images/profile/Untitled.jpg";
import { useDispatch, useSelector } from "react-redux";
import { useState } from "react";
// import LogoutModal from "../../../../components/logout/LogoutModal";
import { useEffect } from "react";
// import { getUserProfileData } from "../../../../redux/profile/userInfo";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

const UserDropdown = () => {
  const [modal, setModal] = useState(false);
  // const { user } = useSelector((s) => s.login);
  // const { info } = useSelector((s) => s.userProfile);
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const MySwal = withReactContent(Swal);
  const { auth } = useSelector((s) => s);

  const toggle = () => {
    return MySwal.fire({
      title: "<h2 style='color: #ff8f6b'>آیا مطمئن هستید؟</h2>",
      showCancelButton: true,
      confirmButtonText: "بله",
      cancelButtonText: "خیر",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        localStorage.clear();
        navigate("/sign"); 
      } else {
      }
    });
  };
  // useEffect(() => {}, [user.first_name, user.last_name]);
  useEffect(() => {
    // dispatch(getUserProfileData(user.id));
  }, []);

  return (
    <UncontrolledDropdown tag="li" className="dropdown-user nav-item">
      
        <div style={{position: "absolute",right: "-360px", top: "3px", width: "380px"}} className="">
          <div className="row">
            <button className="btn btn-bitbucket col-md-5" onClick={toggle}>
            <Power size={14}  />
              خروج از پنل کاربری
              </button>
              <Link to="/helpe" style={{marginRight: "10px"}} className="btn btn-success col-md-5">
                 راهنمای سامانه 
              </Link>
          </div>
        </div>
      <DropdownToggle
        href="/"
        tag="a"
        className="nav-link dropdown-user-link"
        onClick={(e) => e.preventDefault()}
      >
        <div className="user-nav d-sm-flex d-none">
         {auth.user?.name} {auth.user?.lastName} 
          
        </div>
        <Avatar
          img={defaultAvatar}
          imgHeight="40"
          imgWidth="40"
          status="online"
        />
      </DropdownToggle>
      <DropdownMenu end>
        <DropdownItem tag={Link} to="/profile">
          <User size={14} className="me-75" />
          <span className="align-middle">مشخصات کاربر</span>
        </DropdownItem>
        <DropdownItem divider />
        <DropdownItem tag={Link} onClick={toggle}>
          <Power size={14} className="me-75 text-danger" />
          <span className="align-middle text-danger">خروج</span>
        </DropdownItem>
      </DropdownMenu>
      {/* <LogoutModal modal={modal} toggle={toggle} /> */}
    </UncontrolledDropdown>
  );
};

export default UserDropdown;
