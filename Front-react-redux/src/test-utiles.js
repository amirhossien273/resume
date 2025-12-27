import { render } from "@testing-library/react";
import userEvent from "@testing-library/user-event";
import { Provider } from "react-redux";
import { ThemeContext } from "./utility/context/ThemeColors";
import { BrowserRouter } from "react-router-dom";
import { store } from "./redux/store";

export const Wrapper = ({ children }) => {
  return (
    <BrowserRouter>
      <Provider store={store}>
        <ThemeContext>{children}</ThemeContext>
      </Provider>
    </BrowserRouter>
  );
};

export const renderWithRouter = (ui, { route = "/" } = {}) => {
  window.history.pushState({}, "Test page", route);

  return {
    cUser: userEvent.setup(),
    ...render(ui, { wrapper: Wrapper }),
  };
};
