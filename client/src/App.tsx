import {
  createBrowserRouter,
  createRoutesFromElements,
  Route,
  RouterProvider,
} from "react-router-dom";
import Home from "./views/Home";
import RootLayout from "./layout/RootLayout";
import Job from "./views/Job";

function App() {
  const router = createBrowserRouter(
    createRoutesFromElements(
      <Route path="/" element={<RootLayout />}>
        <Route index element={<Home />} />
        <Route path="job" element={<Job />} />
      </Route>
    )
  );
  return <RouterProvider router={router} />;
}

export default App;
