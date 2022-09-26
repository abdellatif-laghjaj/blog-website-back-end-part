export function strSlug(string) {
  return string
    .replace(/&&+/g, "&")
    .replace(/&+/g, "and")
    .replace(/\s+/g, "-")
    .replace(/[^\w\-]+/g, "")
    .replace(/--+/g, "-")
    .toLowerCase()
    .trim();
}
