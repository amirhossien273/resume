import { describe, expect, it } from "vitest";
import { beforeEach, afterEach } from "vitest";
import App from "../../App";
import { renderWithRouter } from "../../test-utiles";
import { act, cleanup, screen } from "@testing-library/react";
import user from "@testing-library/user-event";
import { store } from "../../redux/store";
import { assignUser, userSign } from "../../redux/sign";
import { logOut } from "../../redux/log";

describe("Login components", () => {
  beforeEach(async () => {
    await act(() => {
      // store.dispatch(logOut());
      store.dispatch(assignUser("09221112222"));
      store.dispatch(userSign("09221112222"));
    });
  });
  it("render correctly", async () => {
    const route = "/sign";
    renderWithRouter(<App />, { route });
    expect(screen.getByRole("button", { name: /submit/i })).toBeInTheDocument();
    expect(screen.getByLabelText("Password")).toBeInTheDocument();
    expect(
      screen.getByRole("link", { name: /login with otp/i })
    ).toBeInTheDocument();
    expect(screen.getByRole("button", { name: /submit/i })).toBeInTheDocument();
  });
  it("enter empty input for submit", async () => {
    const route = "/sign";
    renderWithRouter(<App />, { route });
    const passInp = screen.getByLabelText("Password");
    expect(passInp).toBeInTheDocument();
    await user.type(passInp, "  ");
    await user.click(screen.getByRole("button", { name: "Submit" }));
    expect(screen.getByText(/please fill the input's/i)).toBeInTheDocument();
  });
  it("with wrong password we can't login to app", async () => {
    const route = "/sign";
    renderWithRouter(<App />, { route });
    const passInp = screen.getByLabelText("Password");
    const subBtn = screen.getByRole("button", { name: /submit/i });
    await act(async () => await user.type(passInp, "112233"));
    await user.click(subBtn);
    expect(
      screen.getByText(/username or password is invalid/i)
    ).toBeInTheDocument();
  });
  it("cleaning up errors after start refill password input", async () => {
    const route = "/sign";
    renderWithRouter(<App />, { route });
    const passInp = screen.getByLabelText("Password");
    const subBtn = screen.getByRole("button", { name: /submit/i });
    await act(async () => await user.type(passInp, "222"));
    await user.click(subBtn);
    expect(
      screen.getByText(/username or password is invalid/i)
    ).toBeInTheDocument();
    await user.clear(passInp);
    await act(async () => await user.type(passInp, "3"));
    expect(screen.queryByText(/username or password is invalid/i)).toBeNull();
  });
  it("input with correct value redirect to dashboard page", async () => {
    const route = "/sign";
    renderWithRouter(<App />, { route });
    const passInp = screen.getByLabelText("Password");
    const subBtn = screen.getByRole("button", { name: /submit/i });
    await act(async () => await user.type(passInp, "321"));
    await user.click(subBtn);
    expect(screen.queryByText(/username or password is invalid/i)).toBeNull();
  });
});
