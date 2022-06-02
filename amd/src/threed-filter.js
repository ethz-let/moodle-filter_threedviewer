import {loader} from "filter_threedviewer/threed-viewer";

export const init = () => {
    loader.loaders.ktx2.setTranscoderPath('/filter/threedviewer/libs/basis/');
    loader.loaders.draco.setDecoderPath('/filter/threedviewer/libs/draco/');

    const modelLinks = document.querySelectorAll(':not(threed-model) > a[href*=".stl"], :not(threed-model) > a[href*=".gltf"], :not(threed-model) > a[href*=".glb"]');
    modelLinks.forEach((el) => {
        const addr = new URL(el);
        const width = addr.searchParams.get('width');
        const noWireframe = addr.searchParams.get('nowireframe');
        const zoom = addr.searchParams.get('zoom');
        const noCenter = addr.searchParams.get('nocenter');
        const noScale = addr.searchParams.get('noScale');
        let height = addr.searchParams.get('height');

        if (!addr.pathname.endsWith('.stl') &&
                !addr.pathname.endsWith('.gltf') &&
                !addr.pathname.endsWith('.glb')) {
            return;
        }

        if (!height || height == '') {
            height = "300px";
        }

        el.setAttribute('href', addr.href.replace(addr.search, ''));

        const viewer = document.createElement('threed-viewer');
        viewer.setAttribute('controls', '');
        viewer.setAttribute('help', '');
        viewer.setAttribute('toolbar', '');
        viewer.setAttribute('axis-helper', '');
        if (!!width && width != '') {
            viewer.setAttribute('width', width);
        }
        if (!!height && height != '') {
            viewer.setAttribute('height', height);
        }
        if (noWireframe === null) {
            viewer.setAttribute('wireframe', '');
        }
        if (zoom !== null && zoom != '') {
            viewer.setAttribute('camera-zoom', zoom);
        }
        const model = document.createElement('threed-model');
        if (noScale === null) {
            model.setAttribute('scale', '');
        }
        if (noCenter === null) {
            model.setAttribute('center', '');
        }
        model.appendChild(el.cloneNode());
        viewer.appendChild(model);
        el.parentNode.replaceChild(viewer, el);
    });
};
