import { render, screen } from "@testing-library/react";
import user from "@testing-library/user-event";
import OTPComp2 from "../../components/auth/OTPComp2";
import { Wrapper } from "../../test-utiles";

describe("OTP component", () => {
  it("render correctly", () => {
    render(<OTPComp2 />, { wrapper: Wrapper });
    expect(screen.getByRole("textbox", { name: /verification code/i }))
      .toBeInTheDocument;
    expect(screen.getByText("Resend Verification Code")).toBeInTheDocument;
  });

  // it("we can't enter more than 5 character in input", async () => {
  //   render(<OTPComp2 />, { wrapper: Wrapper });
  //   const input = screen.getByRole("textbox", { name: /otp/i });
  //   expect(input).toBeInTheDocument;

  //   await user.type(input, "1234");
  //   // expect(input).toHaveValue("12345");
  // });
});
