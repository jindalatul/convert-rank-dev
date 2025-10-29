import './index.css';
import React from "react";
import { Routes, Route} from "react-router-dom";
import TopNav from './components/common/topNav.js';
import Footer from './components/common/footer.js';

import MainFormPage from './components/MainFormPage.js';
import DashboardPage from './components/DashboardPage.js';
import ProjectList from './components/projects/ProjectList.js';

//<Route path="/dashboard/:projectId" element={<DashboardPage />} />

function App() {

  return (
    <>
    <TopNav></TopNav>
          <Routes>
              {/* Conditional route */}
            <Route index element={<ProjectList />} />
            <Route path="/onboarding/" element={<MainFormPage />} />
            <Route path="/projects/" element={<ProjectList />} />
            <Route path="/dashboard/:projectId" element={<DashboardPage />} />
          </Routes>
    <Footer />
    </>
  );
}

export default App;
