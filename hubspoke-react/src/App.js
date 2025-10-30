import './index.css';
import React from "react";
import { Routes, Route, Navigate} from "react-router-dom";
import TopNav from './components/common/topNav.js';
import Footer from './components/common/footer.js';
import MainFormPage from './components/MainFormPage.js';

import Projects from './pages/Projects.js';
import Keywords from './pages/Keywords.js'
import IR from './pages/IR.js';
import Persona from './pages/Persona.js';

//<Route path="/dashboard/:projectId" element={<DashboardPage />} />

function App() {

  return (
    <>
    <TopNav></TopNav>
          <Routes>
              {/* Conditional route */}
            <Route index element={<Projects />} />
             <Route path="/onboarding/" element={<MainFormPage />} />             
             <Route path="/" element={<Navigate to="/projects" />} />
             <Route path="/projects" element={<Projects />} />
             <Route path="/projects/:projectId/persona" element={<Persona />} />
             <Route path="/projects/:projectId/keywords" element={<Keywords />} />
             <Route path="/projects/:projectId/ir" element={<IR />} />
             </Routes>
    <Footer />
    </>
  );
}

export default App;
