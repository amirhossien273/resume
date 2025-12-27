import { Circle, User } from "react-feather";

export default [
  {
    id: "profile",
    title: "Profile",
    icon: <User />,
    children: [
      {
        id: "user-info",
        title: "Personal Info",
        icon: <Circle size={12} />,
        navLink: "/profile/user",
      },
      {
        id: "doctor-info",
        title: "Speciality Info",
        icon: <Circle size={12} />,
        navLink: "/profile/doctor",
      },
    ],
  },
];
