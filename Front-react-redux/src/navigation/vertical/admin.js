import { useEffect } from "react";
import { Circle, Folder, FolderPlus, Layers, User, UserPlus, Users } from "react-feather"
import { useDispatch, useSelector } from "react-redux";
import { featchOrgans } from "../../redux/organ/organ";

export const admin = () =>{

    const dispatch = useDispatch();
    const { organ } = useSelector((s) => s);

    useEffect( () => {

        dispatch(featchOrgans());
    }, [])

    const showGroup = (id) => {

       const data = []; 
        organ.data.map( (valueCategory, index) => {
            if(id == valueCategory.id){
                valueCategory.organ.map( (value, index) => {
                    data.push(
                        {
                        id: value.id,
                        title: value.name,
                        icon: <Circle size={12} />,
                        navLink: `/show-list-asset/${value.id}`,
                        }
                    );
                })
            }
        });

        return data;
    }
    return   [
        {
            id: "Dashboard",
            title: "داشبورد",
            icon: <Layers size={20} />,
            navLink: "/dashboard",
        },
        {
            id: "organStore",
            title: "ثبت  قرارگاه / معاونت",
            icon: <FolderPlus size={20} />,
            navLink: "/organ",
        },
        {
            id: "createUser",
            title: "ثبت کاربر",
            icon: <UserPlus size={20} />,
            navLink: "/creat-user",
        },
        {
            id: "userList",
            title: "نمایش کاربران",
            icon: <Users size={20} />,
            navLink: "/users",
        },
        {
            id: "showAllOrgan",
            title: "معاونت دستگاهی",
            icon: <Folder size={20} />,
            children: showGroup(1),
        },
        {
            id: "showAllOrgan2",
            title: "معاونت موضوعی",
            icon: <Folder size={20} />,
            children: showGroup(2),
        },
        {
            id: "showAllOrgan3",
            title: "قرارگاه ها",
            icon: <Folder size={20} />,
            children: showGroup(3),
        },
        {
            id: "chartRisk",
            title: "خروجی بر روی نمودار",
            icon: <Folder size={20} />,
            navLink: "/charts",
        },
        {
            id: "findOut",
            title: "خروجی نهایی تهدیدات",
            icon: <Folder size={20} />,
            navLink: "/find-output",
        }
    ]
}