import { Circle, Clock } from "react-feather";

export default [
  {
    id: "appointment",
    title: "Appointment",
    icon: <Clock size={20} />,
    children: [
      {
        id: "list-appointment",
        title: "List",
        icon: <Circle size={12} />,
        navLink: "/appointment/list",
      },
      {
        id: "manage-appointment",
        title: "TimeSheet",
        icon: <Circle size={12} />,
        navLink: "/appointment/manage",
      },

    ],
  },
];
