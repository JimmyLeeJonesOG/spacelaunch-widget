import { useEffect } from "react";

export default function SpaceLaunchWidget({
  limit = 5,
  provider = ""
}) {
  useEffect(() => {
    const src = "https://spacelaunch.dev/embedable.js";
    if (!document.querySelector(`script[src="${src}"]`)) {
      const s = document.createElement("script");
      s.src = src;
      s.async = true;
      document.body.appendChild(s);
    }
  }, []);

  return (
    <div
      className="space-launch-widget"
      data-limit={limit}
      data-provider={provider}      
    />
  );
}