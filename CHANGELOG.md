# Changelog – R3D Pannellum (Joomla 5 Module)

All notable changes to this project will be documented in this file.  
Versioning follows **Joomla 5.x conventions**:  
- `+0.0.1` for incremental updates / fixes  
- `+0.1.x` for new milestones (features, structural changes)  

---

## [5.0.0] – 2025-09-03
### Added
- Initial release of `mod_r3d_pannellum`
- Basic setup with minimal global viewer parameters:
  - Panorama image
  - Autoload toggle
- Included demo panorama (`media/demo.jpg`) for testing
- Tabs for **Basic / Intermediate / Advanced** setups:
  - **Basic**: functional
  - **Intermediate**: placeholder (Hotspots planned)
  - **Advanced**: placeholder (Multi-scene tours planned)
- English and German language files with explicit `<languages>` declaration

### Notes
- Requires **Joomla 5.3+** and **PHP 8.2+**
- Code comments in English only
- Headers in all PHP files follow unified R3D convention

---

## Planned
### [5.0.1] – TBD
- Implement hotspot subform UI in *Intermediate* tab
- Allow multiple hotspots with link-to-scene logic
- Optional DB integration (proof-of-concept)

### [5.1.0] – TBD
- Multi-scene tour builder in *Advanced* tab
- DB-backed scene/hotspot management
- JSON auto-generation for complex tours
