# Threed-Viewer Moodle filter

This moodle filter uses a custom Javascript layer ([threed-viewer](https://github.com/cyrilpic/threed-viewer)) built on top of Three.js to display an interactive viewer for STL models and GLTF models and scenes.

The filter's work is limited to detecting the presence of links containing `.stl`, `.gltf` or `.glb` in the content and asking the Javascript library to be loaded.

## Usage

### Basic customization

There are two ways to add a viewer to content on moodle.

In the straightforward way, a link to the STL file is added through the content editor. The appearance can be somewhat controlled by passing query parameters:

```html
<a href="http://mymoodle.com/draftfile.php/.../myfile.stl?width=300px&height=300px">myfile.stl</a>
```

### Advanced customization

To use the full capabilities of [threed-viewer](https://github.com/cyrilpic/threed-viewer), the users need to use its custom elements to wrap the link to the STL file:

```html
<threed-viewer width=50% height=400px controls help axi-helper toolbar>
    <threed-model scale center><a href="http://mymoodle.com/draftfile.php/.../myfile.stl">myfile.stl</a></threed-model>
</threed-viewer>
```

## License

This filter is distributed under the GNU GPL 3.0+ License.
It includes a bundled version of [three.js](https://threejs.org) (distributed under the MIT License) and libraries for decoding KTX2 textures and Draco compressed meshes (distributed under the Apache License 2.0).
