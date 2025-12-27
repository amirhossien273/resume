// all data for doctor detail info
export const initDoctorInfo = {
  father_name: "",
  education_enum: "",
  medical_system_no: "",
  marital_status_enum: "",
  country_id: "",
  state_id: "",
  city_id: "",
  nationality_id: "",
  nationality_code: "",
  appointment_duration: 15,
};

export const educationList = [
  { label: "General Physician", value: "general_physician" },
  { label: "Specialist Physician", value: "specialist_physician" },
  { label: "Super Specialist Physician", value: "super_specialist_physician" },
  { label: "Fellowship Physician", value: "fellowship_physician" },
  { label: "PHD", value: "phd" },
];

export const appointmentDuration = [
  { label: "15 min", value: 15 },
  { label: "30 min", value: 30 },
  { label: "45 min", value: 45 },
  { label: "60 min", value: 60 },
];

export const maritialList = [
  { label: "Single", value: "single" },
  { label: "Married", value: "married" },
  { label: "Divorced", value: "divorced" },
  { label: "Widow", value: "widow" },
];

// all data for user detail info

export const initUserInfo = {
  id: "",
  first_name: "",
  last_name: "",
  email: "",
  mobile: "",
  gender_enum: "",
  birthday: "",
};

export const genderList = [
  { label: "Male", value: "male" },
  { label: "Female", value: "female" },
  { label: "Other", value: "other" },
];
