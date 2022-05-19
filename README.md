# Threed-Viewer Moodle filter

This moodle filter uses a custom Javascript layer ([threed-viewer](https://github.com/cyrilpic/threed-viewer)) built on top of Three.js to display an interactive viewer for STL models and GLTF models and scenes.

The filter's work is limited to detecting the presence of links containing `.stl`, `.gltf` or `.glb` in the content and asking the Javascript library to be loaded.

## Usage

There are two ways to add a viewer to content on moodle.

### Basic customization

In the straightforward way, a link to an STL or GLTF file is added through the content editor. The appearance of the viewer can be controlled by passing query parameters:

```html
<a href="http://mymoodle.com/draftfile.php/.../myfile.stl?width=300px&height=300px">myfile.stl</a>
```

There are 6 parameters that are recognized in this approach:

* `width` (default: 100%) and `height` (default: 300 px) to control the size of the viewer
* `zoom` (value > 0, default 1) to adjust the initial zoom
* `nowireframe` to disable the display of the edges of the model (wireframe)
* `nocenter` to use the reference frame of the original file
* `noscale` to use the original scale (if used the zoom coefficient should probably be adapted)

### Advanced customization

To use the full capabilities of [threed-viewer](https://github.com/cyrilpic/threed-viewer), the users need to use its custom elements to wrap the link to the model file:

```html
<threed-viewer width=50% height=400px controls help axi-helper toolbar>
    <threed-model scale center><a href="http://mymoodle.com/draftfile.php/.../myfile.stl">myfile.stl</a></threed-model>
</threed-viewer>
```

Some examples are provided [here](https://cyrilpic.github.io/threed-viewer/), and a [live demo tool](https://cyrilpic.github.io/threed-viewer/demo.html) exists to check out the effects of the different parameters. 

## License

This filter is distributed under the GNU GPL 3.0+ License.
It includes a bundled version of [three.js](https://threejs.org) (distributed under the MIT License) and libraries for decoding KTX2 textures and Draco compressed meshes (distributed under the Apache License 2.0).
