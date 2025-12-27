import { useEffect } from "react";
import { Circle, Folder, FolderPlus, User, UserPlus, Users } from "react-feather"

export const user = () =>{

    return   [
        {
            id: "CenterStore",
            title: "ثبت  مرکز",
            icon: <User size={20} />,
            navLink: "/center",
        },
        {
            id: "AssetStore",
            title: "ثبت  دارایی",
            icon: <User size={20} />,
            navLink: "/asset",
        },
        {
            id: "ThreatStore",
            title: "ثبت  آسیب پذیری",
            icon: <User size={20} />,
            navLink: "/threats",
        },
        {
            id: "VulnerabilityStore",
            title: "ثبت  تهدیدات",
            icon: <User size={20} />,
            navLink: "/vulnerabilities",
        }
        ,
        {
            id: "VulnerabilityStore1",
            title: "پیامد ها",
            icon: <User size={20} />,
            navLink: "/ranks",
        }
    ]
}